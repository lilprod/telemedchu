<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Department;
use App\Doctor;
use App\Historique;
use App\Notification;
use App\Patient;
use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all appointments and pass it to the view
        $appointments = Appointment::all();

        return view('appointments.index')->with('appointments', $appointments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('appointments.create', compact('departments'));
    }

    public function check(Request $request)
    {
        $doctor =  $request->get('doctor');
        $department = $request->get('department');
        $date =  $request->get('date');
        $time = $request->get('time');
        //$time = $request->get('date').' '.$request->get('time');
        /* $base = Carbon::parse($time);
        $end = $base->copy()->addMinutes(30)->toTimeString();
        $end_time =Carbon::parse($end); */
        //dd($time);
        if (($date != '') && ($time != '')) {
            $appointments = Appointment::where('department_id', $department)
                                        ->where('doctor_id', $doctor)
                                        ->where('date_apt', $date)
                                        ->where('begin_time', $time)
                                        ->get();
            //return $appointment;
            //dd($appointment);
            if (count($appointments) > 0) {
                return 1;
            }
        }
         
        return  0;
        
    }

    public function action(Request $request)
    {
        $id = auth()->user()->id;
        $patient = Patient::where('user_id', '=' ,$id);
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('appointments')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('firstname', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('phone_number', 'like', '%'.$query.'%')
         ->orWhere('address', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      /* else
      {
       $data = DB::table('clients')
         ->orderBy('id', 'desc')
         ->limit(10)
         ->get();  

         $data = [];

        $data = Appointment::where('user_id', $id)
                            ->orderby('date_apt', 'desc')
                            ->paginate(5);
      } */ 
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->firstname.'</td>
         <td>'.$row->email.'</td>
         <td>'.$row->phone_number.'</td>
         <td>'.$row->address.'</td>
         <td><a href="'.route('depositedarticle.create', $row->id).'" class="btn btn-success btn-xs"><i class="fa fa-cart-arrow-down"></i> Nouveau Dépôt</a></td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">Pas de Client trouvé</td>
        <td><a href="'.route('customers.create').'" class="btn btn-success btn-xs"><i class="fa fa-smile-o"></i> Ajouter Client </a></td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'department_id' => 'required',
            'doctor_id' => 'required',
            'begin_time' => 'required',
            'date_apt' => 'required',
        ]);

        
        $time = $request->input('date_apt').' '.$request->input('begin_time');
        $base = Carbon::parse($time);
        $end = $base->copy()->addMinutes(30)->toTimeString();
        //dd($end); 

        $appointment = new Appointment();
        $user = User::findOrFail($request->input('user_id'));
        $appointment->name = $user->name;
        $appointment->firstname = $user->firstname;
        $appointment->phone_number = $user->phone_number;
        $appointment->email = $user->email;
        $appointment->date_apt = $request->input('date_apt');
        $appointment->begin_time = $request->input('begin_time');
        //$appointment->end_time = $request->input('end_time'); 
        $appointment->end_time = $end; 
        $appointment->user_id = $request->input('user_id');
        $appointment->department_id = $request->input('department_id');
        
        $department = Department::findOrFail($appointment->department_id);

        $appointment->department_name = $department->name;

        $appointment->doctor_id = $request->input('doctor_id');

        $doctor = Doctor::findOrFail($appointment->doctor_id);

        $appointment->doctor_name = $doctor->name;
        $appointment->doctorUser_id = $doctor->user_id;
        $appointment->doctor_firstname = $doctor->firstname;
        $appointment->doctor_email = $doctor->email;
        $appointment->doctor_phone = $doctor->phone_number;
        $appointment->doctor_address = $doctor->address;
        $appointment->doctor_profession = $doctor->profession;

        $appointment->status = 0;

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Appointment';
        $historique->user_id = auth()->user()->id;

        
        $appointment->save();
        $historique->save();

        $notification = new Notification();
        $notification->sender_id = auth()->user()->id;
        $notification->body = "Le patient $appointment->name $appointment->firstanme a fait une demande de rendez-vous pour le $appointment->date_apt!";
        //$notification->route = route('appointments.show', $appointment->id);
        $notification->route = route('doctor-pendingappointments');
        $notification->status = 0;
        $notification->receiver_id = $appointment->doctorUser_id;
        $notification->save();

        //Redirect to the users.index view and display message
        return redirect()->route('myappointments')
            ->with('success',
             'Votre rendez-vous a été enregistré avec succès.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id); //Get appointment with specified 
        $user = User::findOrFail($appointment->user_id);
        $appointment->profession = $user->profession;
        $appointment->date = Carbon::parse($appointment->date_apt);
        $doctor = Doctor::findOrFail($appointment->doctor_id);
        $service = $doctor->department_name;

        return view('appointments.show', compact('appointment','doctor','service')); //pass appointment data to view

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id); //Get appointment with specified id

        $departments = Department::all();

        return view('appointments.edit', compact('appointment', 'departments')); //pass appointment data to view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $this->validate($request, [
            'department_id' => 'required',
            'doctor_id' => 'required',
            'begin_time' => 'required',
            'date_apt' => 'required',
        ]);

        $time = $request->input('date_apt').' '.$request->input('begin_time');
        $base = Carbon::parse($time);
        $end = $base->copy()->addMinutes(30)->toTimeString();

        $user = User::findOrFail($request->input('user_id'));
        $appointment->name = $user->name;
        $appointment->firstname = $user->firstname;
        $appointment->phone_number = $user->phone_number;
        $appointment->email = $user->email;
        $appointment->date_apt = $request->input('date_apt');
        $appointment->begin_time = $request->input('begin_time');
        $appointment->end_time = $end; 
        $appointment->user_id = auth()->user()->id;
        $appointment->department_id = $request->input('department_id');

        $department = Department::findOrFail($appointment->department_id);

        $appointment->department_name = $department->name;

        $appointment->doctor_id = $request->input('doctor_id');

        $doctor = Doctor::findOrFail($appointment->doctor_id);

        $appointment->doctor_name = $doctor->name;
        $appointment->doctor_firstname = $doctor->firstname;
        $appointment->doctor_email = $doctor->email;
        $appointment->doctor_phone = $doctor->phone_number;
        $appointment->doctor_address = $doctor->address;
        $appointment->doctor_profession = $doctor->profession;

        $appointment->status = 0;

        $historique = new Historique();
        $historique->action = 'Update';
        $historique->table = 'Appointment';
        $historique->user_id = auth()->user()->id;

        $appointment->save();
        $historique->save();

        //Redirect to the users.index view and display message
        return redirect()->route('appointments.index')
            ->with('success',
             'Votre rendez-vous a été enregistré avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id); //Get appointment with specified id

        $historique = new Historique();
        $historique->action = 'Delete';
        $historique->table = 'Appointment';
        $historique->user_id = auth()->user()->id;

        $appointment->delete();
        $historique->save();

        return redirect()->route('appointments.index')
            ->with('success',
             'Rendez-vous supprimé avec succès.');
    }
}
