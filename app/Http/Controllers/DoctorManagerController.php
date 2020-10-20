<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\ExamImage;
use App\Consultation;
use App\Doctor;
use App\Examination;
use App\Patient;
use App\User;
use App\Notification;
use App\Historique;
use App\Prescription;
use App\PrescriptionExam;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DoctorManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'doctor']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function myprescriptions()
    {
        $id = auth()->user()->id;
        $doctor = Doctor::where('user_id', '=' ,$id)->first();
        $prescriptions = Prescription::where('doctor_id', $doctor->id)
                                        ->orderby('created_at', 'desc')
                                        ->get();

        foreach($prescriptions as $prescription){
            $prescription->date = $prescription->created_at;
        }

        return view('prescriptions.doctorPrescription', compact('prescriptions'));
    }

    public function mybiologies()
    {
        $id = auth()->user()->id;
        //$user = User::findOrFail($id); //Get user
        //$prescriptions = $user->biologies;
        $doctor = Doctor::where('user_id', '=' ,$id)->first();
        $prescriptions = PrescriptionExam::where('doctor_id', $doctor->id)
                                        ->orderby('created_at', 'desc')
                                        ->get();

        foreach($prescriptions as $prescription){
            $prescription->date = $prescription->created_at;
        }

        return view('prescriptions.doctorExamprescription', compact('prescriptions'));
    }

    public function myconsultations()
    {
        //Get all consultations and pass it to the view
        //$consultations = Consultation::all();
        //$consultations = $user->myconsultations;
        //$user = User::findOrFail($user_id);
        $user_id = auth()->user()->id;
        $doctor = Doctor::where('user_id', $user_id)->first();
        
        $consultations = Consultation::where('doctor_id', $doctor->id)
                                        ->orderby('created_at', 'desc')
                                        ->get();
        
        foreach($consultations as $consultation){
            $consultation->date = $consultation->created_at;
        }
        return view('consultations.index')->with('consultations', $consultations);
    }

    public function mypatients()
    {
        $user_id = auth()->user()->id;
        //Get all patients and pass it to the view
        $user = User::findOrFail($user_id);
        $patients = Patient::where('doctor_userId', $user->id)
                            ->get();

        return view('patients.record')->with('patients', $patients);
    }

    public function myexaminations()
    {
        $user_id = auth()->user()->id;
        //Get all patients and pass it to the view
        $user = User::findOrFail($user_id);
        $examinations = Examination::where('doctor_userId', $user->id)
                                    ->orderby('date', 'desc')
                                    ->where('status' ,'=', 2)
                                    ->get();

        foreach($examinations as $examination){
            $examination->date = $examination->created_at;
        }
        return view('examinations.doctorExams')->with('examinations', $examinations);
    }

    public function mypendingApt(){
        $user_id = auth()->user()->id;
        //Get all patients and pass it to the view
        $user = User::findOrFail($user_id);
        $date = Carbon::now()->toDateString();
        $appointments = Appointment::where('doctorUser_id', $user->id)
                                    ->where('status' ,'=', 0)
                                    ->where('date_apt' ,'>=', $date)
                                    ->orderby('date_apt', 'desc')
                                    ->get();
        foreach($appointments as $appointment){
            $patient = User::findOrFail($appointment->user_id);
            $appointment->date = Carbon::parse($appointment->date_apt);
            $appointment->profile_picture = $patient->profile_picture;
        }
        return view('appointments.doctorpendingapt')->with('appointments', $appointments); 
    }


    public function myAppointments()
    {
        $user_id = auth()->user()->id;
        $date = Carbon::now()->toDateString();
        $user = User::findOrFail($user_id);

       /* $appointments = DB::table('appointments')
            ->where(function ($query) use($user_id) {
                $query->where('doctorUser_id','=', $user_id)
                ->where('status','=', 1);
            })->orWhere(function($query)use($user_id) {
                $query->where('date_apt','<', $date)
                ->where('status','=', 1);
            })
            ->orderby('date_apt', 'desc')
            ->get();*/

        $appointments = Appointment::where('doctorUser_id', $user->id)
                                    ->where('date_apt' ,'<', $date)
                                    ->orderby('date_apt', 'desc')
                                    ->get();
                                    
        foreach($appointments as $appointment){
            $patient = User::findOrFail($appointment->user_id);
            $appointment->date = Carbon::parse($appointment->date_apt);
            $appointment->profile_picture = $patient->profile_picture;
        }
        return view('appointments.doctorappointments')->with('appointments', $appointments);
    }

    public function take($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->status = 1;

        $patient = Patient::where('user_id', $appointment->user_id)->first();
            //dd($patient);
        $doctor = Doctor::findOrFail($appointment->doctor_id);
        $patient->doctor_id = $doctor->id;
        $patient->doctor_name = $doctor->name;
        $patient->doctor_firstname = $doctor->firstname;
        $patient->doctor_email = $doctor->email;
        $patient->doctor_gender = $doctor->gender;
        $patient->doctor_phone = $doctor->phone_number;
        $patient->doctor_address = $doctor->address;
        $patient->doctor_profession = $doctor->profession;
        $patient->department_id = $doctor->department_id;
        $patient->department_name = $doctor->department_name;
        $patient->doctor_userId = $doctor->user_id;

        $patient->save();
        $appointment->save();


        $notification = new Notification();
        $notification->sender_id = auth()->user()->id;
        $notification->body = "Le médecin $appointment->doctor_name $appointment->docor_firstanme a accépté prendre votre rendez-vous du $appointment->date_apt de $appointment->begin_time au $appointment->end_time!";
        $notification->route = route('appointments.show', $appointment->id);
        $notification->status = 0;
        $notification->receiver_id = $appointment->user_id;
        $notification->save();

        //return $appointment;
        return redirect()->route('doctor-pendingappointments')
            ->with('success',
             'Votre confirmation de rendez-vous a été envoyé au patient avec succès!');
    }

    public function takeUp(Request $request)
    {
        $appointment = Appointment::findOrFail($request->get('id'));
        $appointment->status = 1;

        $patient = Patient::where('user_id', $appointment->user_id)->first();

        $doctor = Doctor::findOrFail($appointment->doctor_id);
        $patient->doctor_id = $doctor->id;
        $patient->doctor_name = $doctor->name;
        $patient->doctor_firstname = $doctor->firstname;
        $patient->doctor_email = $doctor->email;
        $patient->doctor_gender = $doctor->gender;
        $patient->doctor_phone = $doctor->phone_number;
        $patient->doctor_address = $doctor->address;
        $patient->doctor_profession = $doctor->profession;
        $patient->department_id = $doctor->department_id;
        $patient->department_name = $doctor->department_name;
        $patient->doctor_userId = $doctor->user_id;

        $patient->save();
        $appointment->save();

        $notification = new Notification();
        $notification->sender_id = auth()->user()->id;
        $notification->body = "Le médecin $appointment->doctor_name $appointment->docor_firstanme a accépté prendre votre rendez-vous du $appointment->date_apt de $appointment->begin_time au $appointment->end_time!";
        $notification->route = route('appointments.show', $appointment->id);
        $notification->status = 0;
        $notification->receiver_id = $appointment->user_id;
        $notification->save();

        //return $appointment;
        return $appointment;
    }

    public function archivedApt(Request $request)
    {
        $appointment = Appointment::findOrFail($request->get('id'));
        $appointment->status = 2;
        $appointment->save();
        /* $notification = new Notification();
        $notification->sender_id = auth()->user()->id;
        $notification->body = "Le médecin $appointment->doctor_name $appointment->docor_firstanme a accépté prendre votre rendez-vous du $appointment->date_apt de $appointment->begin_time au $appointment->end_time!";
        $notification->route = route('appointments.show', $appointment->id);
        $notification->status = 0;
        $notification->receiver_id = $appointment->user_id;
        $notification->save(); */

        return $appointment;
    }

    public function myposts()
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        $posts = $user->posts();

        $lastposts = DB::table('posts')
             ->orderby('id', 'desc')
             ->limit(3)
             ->get();

        return view('posts.myposts', compact('posts', 'lastposts'));
    }

    public function patientResults()
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        $examinations = Examination::where('doctor_userId', $user->id)
                                    ->where('status' ,'=', 0)
                                    ->get();

        return view('examinations.patientresults')->with('examinations', $examinations);
    }

    public function patientResultshow($id)
    {
        $examination = Examination::findOrfail($id);

        $images = ExamImage::where('examination_id',$examination->id)
                            ->get();

        return view('examinations.showresult', compact('examination', 'images'));
    }

    public function postDoctorResult(Request $request)
    {
        $this->validate($request, [
            'examination_id' => 'required',
            'result' => 'required',
        ]);

        $id = $request->input('examination_id');
        $examination = Examination::findOrFail($id);
        $examination->result = $request->input('result');
        $examination->status = 2;
        $examination->save();

        $historique = new Historique();
        $historique->action = 'Update-Result';
        $historique->table = 'Examination';
        $historique->user_id = auth()->user()->id;

        $examination->save();
        $historique->save();

        $notification = new Notification();
        $notification->sender_id = auth()->user()->id;
        $notification->body = "Votre médecin $examination->doctor_name $examination->docor_firstanme vous a envoyé la conduite à tenir pour votre examen du $examination->date!";
        $notification->route = route('examinations.show', $examination->id);
        $notification->status = 0;
        $notification->receiver_id = $examination->user_id;
        $notification->save();

        //Redirect to the users.index view and display message
        return redirect()->route('doctor-examinations')
            ->with('success',
             'La conduite à tenir a été transmis au patient avec succès!');
    }
}
