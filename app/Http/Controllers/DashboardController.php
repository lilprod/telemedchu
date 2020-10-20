<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\User; 
use App\Appointment;
use App\Patient;
use App\Doctor;
use App\Consultation;
use App\Examination;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = Carbon::now()->toDateString();
        $user_id = auth()->user()->id;
        //Get all patients and pass it to the view
        $user = User::findOrFail($user_id);

        $appointments = Appointment::where('doctorUser_id', $user->id)
                                    ->where('status' ,'=', 1)
                                    ->where('date_apt', $date)
                                    ->get();
        foreach($appointments as $appointment){
            $patient = User::findOrFail($appointment->user_id);
            $appointment->date = Carbon::parse($appointment->date_apt);
            $appointment->profile_picture = $patient->profile_picture;
        }

        $apt_pends = Appointment::where('doctorUser_id', $user->id)
                                    ->where('status' ,'=', 0)
                                    ->where('date_apt' ,'>=', $date)
                                    ->get();

        $doctor = Doctor::where('user_id', $user_id)->first();
        if($doctor){
            $patients = Patient::where('doctor_userId', $user->id)
                            ->get();

            $examinations = Examination::where('doctor_userId', $user->id)
                                        ->get();

            $consultations = Consultation::where('doctor_id', $doctor->id)
                                            ->get();

            $nbre_aptpend = count($apt_pends);
            $nbre_patient = count($patients);
            $nbre_exam = count($examinations);
            $nbre_consultation = count($consultations);
            $nb_consultation = 0;
            $nb_exam = 0;
            $nb_aptpend = 0;
        }else{
            $nbre_aptpend = 0;
            $nbre_patient = 0;
            $nbre_exam = 0;
            $nbre_consultation = 0;
            $nb_aptpend = 0;
        }

        $patient = Patient::where('user_id', $user_id)->first();
        if($patient){

            $apts = Appointment::where('user_id', $user->id)
                                    ->whereNotIn('status', array(2))
                                    ->where('date_apt' ,'>=', $date)
                                    ->get();
            $consultations = Consultation::where('patient_id', $patient->id)
                                        ->get();
            $examinations = Examination::where('patient_id', $patient->id)
                                        ->get();
            $nb_consultation = count($consultations);
            $nb_exam = count($examinations);
            $nb_aptpend = count($apts);
            $nbre_aptpend = 0;
            $nbre_patient = 0;
            $nbre_exam = 0;
            $nbre_consultation = 0;
        }else{
            $nb_consultation = 0;
            $nb_exam = 0;
            $nb_aptpend = 0;
        }
        
        return view('dashboard',compact('appointments','nbre_aptpend','nbre_patient', 'nbre_exam','nbre_consultation', 'nb_exam','nb_consultation', 'nb_aptpend'));
    
    }

    public function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('patients')
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
         <td><a href="'.route('patients.show', $row->id).'" class="btn btn-primary btn-xs"><i class="fa fa-cart-arrow-down"></i> Fiche patiente</a></td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">Patient non trouvé</td>
        <td><a href="'.route('patients.create').'" class="btn btn-primary btn-xs"><i class="fa fa-smile-o"></i> Nouveau patient </a></td>
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
}
