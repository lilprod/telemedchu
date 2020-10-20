<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prescription;
use App\Patient;
use App\Doctor;
use App\Historique;
use App\TypePrescription;
use App\Consultation;
use Carbon\Carbon;
use App\PrescribedDrug;
use App\Medication;
use App\PrescriptionExam;


class PrescriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'doctor']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all prescriptions and pass it to the view
        $prescriptions = Prescription::all();

        return view('prescriptions.index')->with('prescriptions', $prescriptions);
    }

    public function prescriptionBiologies()
    {
        //Get all prescriptions and pass it to the view
        $prescriptions = PrescriptionExam::all();

        return view('prescriptions.biology')->with('prescriptions', $prescriptions);
    }

    public function getConsultation()
    {
        $consultations = Consultation::all(); //Get all consultations

        return view('prescriptions.checkconsultation', compact('consultations'));
    }

    public function addPrescription($id)
    {
        $consultation = Consultation::findOrFail($id);

        $typeprescriptions = TypePrescription::all();

        $medications = Medication::all();

        $date_now = Carbon::now();

        return view('prescriptions.create', compact('consultation', 'typeprescriptions', 'medications', 'date_now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* $date = Carbon::now();

        $typeprescriptions = TypePrescription::all();

        $medications = Medication::all();

        //dd($typeprescriptions);

        return view('prescriptions.create', compact('typeprescriptions', 'medications', 'date' )); */
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
            'type_id' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
        ]);

        $medication = $request['medication_id']; //Retrieving the medication field
            //Checking if a medication was selected
            
        if (isset($medication)) {
        //dd('pharmacie');
        $prescription = new Prescription();
        $data = $request->all();
        //$data['medication_id'] = (array) $data['medication_id'] ;
        //dd($data['medication_id']);

        $prescription->type_id = $request->input('type_id');
        $typeprescription = TypePrescription::findOrFail($prescription->type_id);
        $prescription->type_title = $typeprescription->title;

        $prescription->date = $request->input('date');
        //$prescription->prescription= $request->input('prescription');

        $prescription->consultation_id = $request->input('consultation_id');

        $consultation = Consultation::findOrFail($prescription->consultation_id);

        $prescription->consultation_reason = $consultation->reason;
        $prescription->consultation_height = $consultation->height;
        $prescription->consultation_weight = $consultation->weight;
        $prescription->consultation_pulse = $consultation->pulse;
        $prescription->consultation_blood_pressure = $consultation->blood_pressure;
        $prescription->diagnostic = $consultation->diagnostic;

        $prescription->quantity_med = 0;
        

        $prescription->patient_id = $request->input('patient_id');

        $patient = Patient::findOrFail($consultation->patient_id);
        $prescription->user_id = $patient->user_id;

        $prescription->patient_name = $patient->name;
        $prescription->patient_firstname = $patient->firstname;
        $prescription->patient_email = $patient->email;
        $prescription->patient_phone = $patient->phone_number;
        $prescription->patient_address = $patient->address;
        $prescription->gender = $patient->gender;
        $prescription->birth_date = $patient->birth_date;
        $prescription->age = $consultation->age;
        $prescription->patient_profession = $patient->profession;

        $prescription->doctor_id = $request->input('doctor_id');

        $doctor = Doctor::findOrFail($consultation->doctor_id);

        $prescription->doctor_name = $doctor->name;
        $prescription->doctor_firstname = $doctor->firstname;
        $prescription->doctor_email = $doctor->email;
        $prescription->doctor_phone = $doctor->phone_number;
        $prescription->doctor_address = $doctor->address;
        $prescription->doctor_profession = $doctor->profession;
        
        //dd($prescription);
        $prescription->save();
        
        $i = 0;

        foreach($data['medication_id'] as $item){
            
            $drugprescribed = Medication::findOrFail($item);
            
            $prescribeddrug = new PrescribedDrug();

            $prescribeddrug->medication_id = $item;
            $prescribeddrug->medication_name = $drugprescribed->name;
            $prescribeddrug->prescription = $data['prescription'][$i];
            $prescribeddrug->prescription_id = $prescription->id;
            $prescribeddrug->patient_id = $prescription->patient_id;
            $prescribeddrug->doctor_id = $prescription->doctor_id;
            $prescribeddrug->medecine_family = $drugprescribed->medecine_family;
            $prescribeddrug->form = $drugprescribed->form;
            $prescribeddrug->dosage = $drugprescribed->dosage;
            $prescribeddrug->presentation = $drugprescribed->presentation;
            $prescribeddrug->observation= $drugprescribed->observation;
            
            $prescribeddrug->save();

            $i++;
            $n = $i;
        }

        $prescription = Prescription::findOrFail($prescription->id);
        $prescription->quantity_med = $n;

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Prescription';
        $historique->user_id = auth()->user()->id;

        $prescription->save();
        $historique->save();

        //Redirect to the users.index view and display message
        return redirect()->route('doctor-prescriptions')
            ->with('success',
             'Nouvelle ordonnance ajoutée avec succès.'); 
        } else {
            //dd('biologie');

            $prescription = new PrescriptionExam();

            $prescription->type_id = $request->input('type_id');
            $typeprescription = TypePrescription::findOrFail($prescription->type_id);
            $prescription->type_title = $typeprescription->title;

            $prescription->date = $request->input('date');
            $prescription->prescription= $request->input('description');

            $prescription->consultation_id = $request->input('consultation_id');

            $consultation = Consultation::findOrFail($prescription->consultation_id);

            $prescription->consultation_reason = $consultation->reason;
            $prescription->consultation_height = $consultation->height;
            $prescription->consultation_weight = $consultation->weight;
            $prescription->consultation_pulse = $consultation->pulse;
            $prescription->consultation_blood_pressure = $consultation->blood_pressure;
            $prescription->diagnostic = $consultation->diagnostic;

            $prescription->patient_id = $request->input('patient_id');
            
            $patient = Patient::findOrFail($consultation->patient_id);

            $prescription->user_id = $patient->user_id;
            $prescription->patient_name = $patient->name;
            $prescription->patient_firstname = $patient->firstname;
            $prescription->patient_email = $patient->email;
            $prescription->patient_phone = $patient->phone_number;
            $prescription->patient_address = $patient->address;
            $prescription->gender = $patient->gender;
            $prescription->birth_date = $patient->birth_date;
            $prescription->age = $consultation->age;
            $prescription->patient_profession = $patient->profession;

            $prescription->doctor_id = $request->input('doctor_id');

            $doctor = Doctor::findOrFail($consultation->doctor_id);

            $prescription->doctor_name = $doctor->name;
            $prescription->doctor_firstname = $doctor->firstname;
            $prescription->doctor_email = $doctor->email;
            $prescription->doctor_phone = $doctor->phone_number;
            $prescription->doctor_address = $doctor->address;
            $prescription->doctor_profession = $doctor->profession;
            $prescription->status = 0;
            
            //dd($prescription);
            $prescription->save();

            $historique = new Historique();
            $historique->action = 'Create';
            $historique->table = 'PrescriptionExam';
            $historique->user_id = auth()->user()->id;

            $prescription->save();
            $historique->save();

            //Redirect to the users.index view and display message
            return redirect()->route('doctor-examprescriptions')
                ->with('success',
                'Nouvelle ordonnance ajoutée avec succès.'); 
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
        $prescription = Prescription::findOrFail($id);
        $doctor = Doctor::findOrFail($prescription->doctor_id);
        $service = $doctor->department_name;

        $prescribeddrugs = $prescription->prescribeddrugs;

        return view('prescriptions.show', compact('prescription', 'prescribeddrugs', 'service'));
    }

    public function precriptExamshow($id)
    {
        $prescription = PrescriptionExam::findOrFail($id);
        $doctor = Doctor::findOrFail($prescription->doctor_id);
        $service = $doctor->department_name;

        return view('prescriptions.prescriptionExamshow', compact('prescription', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
