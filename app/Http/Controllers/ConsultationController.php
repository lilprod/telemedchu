<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultation;
use App\Patient;
use App\Doctor;
use App\Biometry;
use App\Historique;
use Carbon\Carbon;

class ConsultationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','doctor']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all consultations and pass it to the view
        $consultations = Consultation::all();
        
        foreach($consultations as $consultation){
            $consultation->date = $consultation->created_at;
        }

        return view('consultations.index')->with('consultations', $consultations);
    }

    public function getPatient()
    {
        $patients = Patient::all(); //Get all patients

        return view('patients.checkpatient', compact('patients'));
    }

    public function addConsultation($id)
    {
        $patient = Patient::findOrFail($id);

        //$typecontracts = TypeContract::pluck('title', 'id');

        $name = $patient->name.' '.$patient->firstname;

        return view('consultations.create', compact('patient', 'id', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* return view('consultations.create'); */
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
            'patient_id' => 'required',
            'reason' => 'required',
        ]);
        
        $old = $request->input('patient_id');
        $check = Biometry::where('patient_id', '=', $old)
                                ->first();
                                
        //$tmp=0;
        $year1=0;
        $year2=0;
        $age=0;

        if($check) {
        $consultation = new Consultation();
        
        $consultation->reason = $request->input('reason');
        $consultation->height = $request->input('height');
        $consultation->weight = $request->input('weight');
        $consultation->pulse = $request->input('pulse');
        $consultation->temperature = $request->input('temperature');
        $consultation->blood_pressure = $request->input('blood_pressure');
        $consultation->history = $request->input('history');
        $consultation->physic_exam = $request->input('physic_exam');
        $consultation->diagnostic = $request->input('diagnostic');
        $consultation->imc = 0;
        $consultation->patient_id = $request->input('patient_id');

        $patient = Patient::findOrFail($consultation->patient_id);
        
        $dt = Carbon::now();
        Carbon::parse($dt);
        $year2 = intval($dt->year);

        $tmp= Carbon::parse($patient->birth_date);
        $year1 = intval($tmp->year);

        $age = $year2 -$year1;
        $consultation->age = $age;

        $consultation->patient_name = $patient->name;
        $consultation->patient_firstname = $patient->firstname;
        $consultation->patient_email = $patient->email;
        $consultation->patient_phone = $patient->phone_number;
        $consultation->patient_address = $patient->address;
        $consultation->gender = $patient->gender;
        $consultation->birth_date = $patient->birth_date;
        //$consultation->age = $patient->age;
        $consultation->patient_profession = $patient->profession;

        $consultation->doctor_id = $request->input('doctor_id');

        $doctor = Doctor::findOrFail($consultation->doctor_id);

        $consultation->doctor_name = $doctor->name;
        $consultation->doctor_firstname = $doctor->firstname;
        $consultation->doctor_email = $doctor->email;
        $consultation->doctor_phone = $doctor->phone_number;
        $consultation->doctor_address = $doctor->address;
        $consultation->doctor_profession = $doctor->profession;
        $consultation->user_id = auth()->user()->id;

        $biometry = Biometry::findOrFail($check->id);
        $biometry->height = $request->input('height');
        $biometry->weight = $request->input('weight');
        $biometry->temperature = $request->input('temperature');
        $biometry->pulse = $request->input('pulse');
        $biometry->blood_pressure = $request->input('blood_pressure');
        $biometry->biological_indicator = $request->input('biological_indicator');
        $biometry->imc = 0;
        $biometry->patient_id = $patient->id;
        $biometry->user_id = $doctor->id;

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Consultation';
        $historique->user_id = auth()->user()->id;

        $consultation->save();
        $biometry->save();
        $historique->save();

        //Redirect to the users.index view and display message
        return redirect()->route('doctor-consultations')
            ->with('success',
             'Nouvelle Consultation effectuée avec succès.');

        } else {
        $consultation = new Consultation();
        
        $consultation->reason = $request->input('reason');
        $consultation->height = $request->input('height');
        $consultation->weight = $request->input('weight');
        $consultation->pulse = $request->input('pulse');
        $consultation->temperature = $request->input('temperature');
        $consultation->blood_pressure = $request->input('blood_pressure');
        $consultation->history = $request->input('history');
        $consultation->physic_exam = $request->input('physic_exam');
        $consultation->diagnostic = $request->input('diagnostic');
        $consultation->imc = 0;
        $consultation->patient_id = $request->input('patient_id');

        $patient = Patient::findOrFail($consultation->patient_id);
        
        $dt = Carbon::now();
        Carbon::parse($dt);
        $year2 = intval($dt->year);

        $tmp= Carbon::parse($patient->birth_date);
        $year1 = intval($tmp->year);

        $age = $year2 -$year1;
        $consultation->age = $age;

        $consultation->patient_name = $patient->name;
        $consultation->patient_firstname = $patient->firstname;
        $consultation->patient_email = $patient->email;
        $consultation->patient_phone = $patient->phone_number;
        $consultation->patient_address = $patient->address;
        $consultation->gender = $patient->gender;
        $consultation->birth_date = $patient->birth_date;
        //$consultation->age = $patient->age;
        $consultation->patient_profession = $patient->profession;

        $consultation->doctor_id = $request->input('doctor_id');

        $doctor = Doctor::findOrFail($consultation->doctor_id);

        $consultation->doctor_name = $doctor->name;
        $consultation->doctor_firstname = $doctor->firstname;
        $consultation->doctor_email = $doctor->email;
        $consultation->doctor_phone = $doctor->phone_number;
        $consultation->doctor_address = $doctor->address;
        $consultation->doctor_profession = $doctor->profession;
        $consultation->user_id = auth()->user()->id;

        $biometry = new Biometry();
        $biometry->height = $request->input('height');
        $biometry->weight = $request->input('weight');
        $biometry->temperature = $request->input('temperature');
        $biometry->pulse = $request->input('pulse');
        $biometry->blood_pressure = $request->input('blood_pressure');
        $biometry->biological_indicator = $request->input('biological_indicator');
        $biometry->imc = 0;
        $biometry->patient_id = $patient->id;
        $biometry->user_id = $doctor->id;

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Consultation';
        $historique->user_id = auth()->user()->id;

        $consultation->save();
        $biometry->save();
        $historique->save();

        //Redirect to the users.index view and display message
        return redirect()->route('doctor-consultations')
            ->with('success',
             'Nouvelle Consultation effectuée avec succès.');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consultation = Consultation::findOrFail($id); //Get consultation with specified id

        $doctor = Doctor::findOrFail($consultation->doctor_id);
        $service = $doctor->department_name;

        return view('consultations.show', compact('consultation', 'service')); //pass consultation data to view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consultation = Consultation::findOrFail($id); //Get consultation with specified id

        return view('consultations.edit', compact('consultation')); //pass consultation data to view
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
        $consultation = Consultation::findOrFail($id);
        
        $this->validate($request, [
            'patient_id' => 'required',
            'reason' => 'required',
        ]);
        
        $year1=0;
        $year2=0;
        $age=0;
        
        $consultation->reason = $request->input('reason');
        $consultation->height = $request->input('height');
        $consultation->weight = $request->input('weight');
        $consultation->pulse = $request->input('pulse');
        $consultation->temperature = $request->input('temperature');
        $consultation->blood_pressure = $request->input('blood_pressure');
        $consultation->diagnostic = $request->input('diagnostic');
        $consultation->history = $request->input('history');
        $consultation->physic_exam = $request->input('physic_exam');
        $consultation->patient_id = $request->input('patient_id');

        $patient = Patient::findOrFail($consultation->patient_id);
        
        $dt = Carbon::now();
        Carbon::parse($dt);
        $year2 = intval($dt->year);

        $tmp= Carbon::parse($patient->birth_date);
        $year1 = intval($tmp->year);

        $age = $year2 -$year1;
        $consultation->age = $age;

        $consultation->patient_name = $patient->name;
        $consultation->patient_firstname = $patient->firstname;
        $consultation->patient_email = $patient->email;
        $consultation->patient_phone = $patient->phone_number;
        $consultation->patient_address = $patient->address;
        $consultation->gender = $patient->gender;
        $consultation->birth_date = $patient->birth_date;
        $consultation->age = $patient->age;
        $consultation->patient_profession = $patient->profession;

        $consultation->doctor_id = $request->input('doctor_id');

        $doctor = Doctor::findOrFail($consultation->doctor_id);

        $consultation->doctor_name = $doctor->name;
        $consultation->doctor_firstname = $doctor->firstname;
        $consultation->doctor_email = $doctor->email;
        $consultation->doctor_phone = $doctor->phone_number;
        $consultation->doctor_address = $doctor->address;
        $consultation->doctor_profession = $doctor->profession;

        $biometry = Biometry::where('patient_id', $consultation->patient_id);
        $biometry->height = $request->input('height');
        $biometry->weight = $request->input('weight');
        $biometry->temperature = $request->input('temperature');
        $biometry->pulse = $request->input('pulse');
        $biometry->blood_pressure = $request->input('blood_pressure');
        $biometry->biological_indicator = $request->input('biological_indicator');
        $biometry->imc = 0;
        $biometry->patient_id = $patient->id;
        $biometry->user_id = $doctor->id;

        $historique = new Historique();
        $historique->action = 'Update';
        $historique->table = 'Consultation';
        $historique->user_id = auth()->user()->id;

        $consultation->save();
        $biometry->save();
        $historique->save();

        //Redirect to the users.index view and display message
        return redirect()->route('consultations.index')
            ->with('success',
             'Consultation éditée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultation = Consultation::findOrFail($id);
        
        $historique = new Historique();
        $historique->action = 'Delete';
        $historique->table = 'Consultation';
        $historique->user_id = auth()->user()->id;

        $consultation->delete();
        $historique->save();

        return redirect()->route('consultations.index')
            ->with('success',
             'Consultation supprimé avec succès.');
    }
}
