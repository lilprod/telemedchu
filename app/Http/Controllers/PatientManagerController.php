<?php

namespace App\Http\Controllers;

use App\ExamImage;
use App\Examination;
use App\Prescription;
use App\PrescriptionExam;
use App\Historique;
use App\Patient;
use App\Doctor;
use App\Consultation;
use App\User;
use App\Appointment;
use App\Notification;
use App\PrescribedDrug;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PatientManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'clearance']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function myPrescriptions()
    {
        $id = auth()->user()->id;
        $patient = Patient::where('user_id', '=' ,$id)->first();
        $prescriptions = Prescription::where('patient_id', $patient->id)
                                        ->orderby('created_at', 'desc')
                                        ->get();

        foreach($prescriptions as $prescription){
            $prescription->date = $prescription->created_at;
        }

        return view('prescriptions.myprescriptions', compact('prescriptions'));
    }

    public function myBiologies()
    {
        $id = auth()->user()->id;
        //$user = User::findOrFail($id); //Get user
        //$prescriptions = $user->biologies;
        $patient = Patient::where('user_id', '=' ,$id)->first();
        $prescriptions = PrescriptionExam::where('patient_id', $patient->id)
                                        ->orderby('created_at', 'desc')
                                        ->get();

        foreach($prescriptions as $prescription){
            //$prescription->date = $prescription->created_at->toDateString();
            $prescription->date = $prescription->created_at;
        }

        return view('prescriptions.mybiologies', compact('prescriptions'));
    }

    public function myConsultations()
    {
        $id = auth()->user()->id;
        $patient = Patient::where('user_id', $id)->first();
        //$user = User::findOrFail($id); //Get user
        $consultations = Consultation::where('patient_id', $patient->id)
                                        ->orderby('created_at', 'desc')
                                        ->get();

        foreach($consultations as $consultation){
            //$consultation->date = $consultation->created_at->toDateString();
            $consultation->date = $consultation->created_at;
            /* $date = $consultation->created_at->toDateString();
            $date1 = Carbon::parse($date);
            setlocale(LC_TIME, 'fr_FR', 'French');
            //$consultation->date = utf8_encode(strftime("%A %d %B %Y", strtotime($date1)));
            $consultation->date = utf8_encode(strftime("%d %B %Y", strtotime($date1))); */
        }
        return view('consultations.myconsultations', compact('consultations'));
    }

    public function myAppointments()
    {
        //Get all appointments and pass it to the view
        //$appointments = Appointment::all();

        $id = auth()->user()->id;
        $patient = Patient::where('user_id', '=' ,$id);
        $date = Carbon::now()->toDateString();
        //$user = User::findOrFail($id); //Get user
        //$appointments = $user->myappointments;
        $appointments = Appointment::where('user_id', $id)
                                    ->where('date_apt' ,'>=', $date)
                                    ->orderby('date_apt', 'desc')
                                    ->get();

        foreach($appointments as $appointment){
            $appointment->date = Carbon::parse($appointment->date_apt);
        }

        return view('appointments.myappointments')->with('appointments', $appointments); 
        //return view('appointments.myappointments');
    }

    /*public function action(Request $request)
    {
    $id = auth()->user()->id;
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if(($query != '') && ($id != ''))
      {
       $data = DB::table('appointments')
         ->where('user_id', '=', $id)
         ->orWhere('name', 'like', '%'.$query.'%')
         ->orWhere('firstname', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orWhere('phone_number', 'like', '%'.$query.'%')
         ->orWhere('department_name', 'like', '%'.$query.'%')
         ->orWhere('begin_time', 'like', '%'.$query.'%')
         ->orWhere('doctor_name', 'like', '%'.$query.'%')
         ->orWhere('doctor_firstname', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->paginate(5);
         
      }
       else
      {
       
        $data = Appointment::where('user_id', $id)
                            ->orderby('date_apt', 'desc')
                            ->paginate(5);
      } 
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->date_apt.'</td>
         <td>'.$row->department_name.'</td>
         <td>'.$row->doctor_name.' '.$row->doctor_firstname.'</td>
         <td>'.$row->begin_time.' '.$row->end_time.'</td>
         
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">Pas de rendez-vous trouvé</td>
        <td><a href="'.route('appointments.create').'" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> Prendre rendez-vous </a></td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }*/

    public function myExaminations()
    {
        $id = auth()->user()->id;
        $patient = Patient::where('user_id', $id)->first();
        //$user = User::findOrFail($id); //Get user
        $examinations = Examination::where('patient_id', $patient->id)
                                        ->orderby('created_at', 'desc')
                                        ->get();

        foreach($examinations as $examination){
            $examination->date = $examination->created_at;
        }

        return view('examinations.myexaminations', compact('examinations'));
    }

    public function mypendingExams()
    {
        $id = auth()->user()->id;
        $prescriptions = PrescriptionExam::where('user_id', $id)
                                    ->where('status', '=' , 0)
                                    ->orderby('created_at', 'desc')
                                    ->get();

        foreach($prescriptions as $prescription){
            $prescription->date = $prescription->created_at;
        }
        return view('examinations.pendingprescription', compact('prescriptions'));
    }

    public function myarchivedApt()
    {
        $id = auth()->user()->id;
        $date = Carbon::now()->toDateString();
        $appointments = Appointment::where('user_id', $id)
                                    ->where('date_apt','<', $date)
                                    ->orderby('date_apt', 'desc')
                                    ->get();

        foreach($appointments as $appointment){
            $appointment->date = Carbon::parse($appointment->date_apt);
        }
        return view('appointments.archivedapts', compact('appointments'));
    }

    public function addResult($id)
    {
        $prescription = PrescriptionExam::findOrFail($id);

        $date_now = Carbon::now()->toDateString();

        return view('examinations.result', compact('prescription', 'date_now'));
    }

    public function pdfexportexam($id)
    {
        $prescription = PrescriptionExam::findOrFail($id); //Find prescription of id = $id
        $doctor = Doctor::findOrFail($prescription->doctor_id);
        $service = $doctor->department_name;
        $date = Carbon::now();

        $data = ['prescription' => $prescription,
                'service' => $service,
                'date' => $date,
        ];

        $pdf = PDF::loadView('prescriptions.exampdf', $data);
    }

    public function pdfexport($id)
    {
        $prescription = Prescription::findOrFail($id); //Find prescription of id = $id
        $doctor = Doctor::findOrFail($prescription->doctor_id);
        $service = $doctor->department_name;
        $prescribeddrugs = PrescribedDrug::where('patient_id', '=', $prescription->patient_id)
                                            ->where('prescription_id', '=', $prescription->id)
                                            ->get();

        $date = Carbon::now();

        $data = ['prescription' => $prescription,
                'prescribeddrugs' => $prescribeddrugs,
                'service' => $service,
                'date' => $date,
        ];

        $pdf = PDF::loadView('prescriptions.pdf', $data);

        //return $pdf->download('ordonnance'.$date.'.pdf');

        return $pdf->stream('ordonnance'.$date.'.pdf');
    }

    public function postResult(Request $request)
    {
        $this->validate($request, [
            'prescription_id' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'examination_picture' => 'required',
            'examination_picture.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
            //'examination_picture.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $examination = new Examination();
        $examination->prescription_id = $request->input('prescription_id');
        $prescription = PrescriptionExam::findOrFail($examination->prescription_id);
        $prescription->status = 1;
        $examination->prescription = $prescription->prescription;
        //$examination->examination_picture = $fileNameToStore;

        $examination->date = $request->input('date');

        $consultation = Consultation::findOrFail($prescription->consultation_id);

        $examination->consultation_id = $consultation->id;
        $examination->consultation_reason = $consultation->reason;
        $examination->consultation_height = $consultation->height;
        $examination->consultation_weight = $consultation->weight;
        $examination->consultation_pulse = $consultation->pulse;
        $examination->consultation_blood_pressure = $consultation->blood_pressure;
        $examination->diagnostic = $consultation->diagnostic;

        $examination->patient_id = $request->input('patient_id');

        $patient = Patient::findOrFail($examination->patient_id);
        $examination->user_id = $patient->user_id;

        $examination->patient_name = $patient->name;
        $examination->patient_firstname = $patient->firstname;
        $examination->patient_email = $patient->email;
        $examination->patient_phone = $patient->phone_number;
        $examination->patient_address = $patient->address;
        $examination->gender = $patient->gender;
        $examination->birth_date = $patient->birth_date;
        $examination->age = $consultation->age;
        $examination->patient_profession = $patient->profession;

        $examination->doctor_id = $request->input('doctor_id');

        $doctor = Doctor::findOrFail($examination->doctor_id);

        $examination->doctor_name = $doctor->name;
        $examination->doctor_firstname = $doctor->firstname;
        $examination->doctor_email = $doctor->email;
        $examination->doctor_phone = $doctor->phone_number;
        $examination->doctor_address = $doctor->address;
        $examination->doctor_profession = $doctor->profession;
        $examination->doctor_userId = $doctor->user_id;
        
        $examination->status = 0;

        $historique = new Historique();
        $historique->action = 'Create-without-Result';
        $historique->table = 'Examination';
        $historique->user_id = auth()->user()->id;

        $examination->save();
        $prescription->save();
        $historique->save();

        if ($request->hasfile('examination_picture')) {

            foreach ($request->file('examination_picture') as $file) {
                // Get filename with the extension
                $fileNameWithExt = $file->getClientOriginalName();

                // Get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

                // Get just ext
                $extension = $file->getClientOriginalExtension();

                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;

                // Upload Image
                $path = $file->storeAs('public/examination_files', $fileNameToStore);

                $examimage = new ExamImage();

                $examimage->examination_picture = $fileNameToStore;
                $examimage->examination_id = $examination->id;
                $examimage->patient_id = $request->input('patient_id');
                $examimage->doctor_id = $request->input('doctor_id');
                $examimage->prescription_id = $request->input('prescription_id');

                $examimage->save();
            }
            
        }

        $notification = new Notification();
        $notification->sender_id = auth()->user()->id;
        $notification->body = "Le patient $examination->patient_name $examination->patient_firstanme vous a envoyé le(s) clichet(s) de son examen du $examination->date!";
        $notification->route = route('result.show', $examination->id);
        $notification->status = 0;
        $notification->receiver_id = $doctor->user_id;
        $notification->save();

        //Redirect to the users.index view and display message
        return redirect()->route('dashboard')
            ->with('success',
             'Votre résultat d\'examen a été transmis à votre Medécin avec succès!');
    }
}
