<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Examination;
use App\Historique;
use App\Patient;
use App\PrescriptionExam;
use App\Consultation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExaminationController extends Controller
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
        //Get all examinations and pass it to the view
        $examinations = Examination::all();

        return view('examinations.index')->with('examinations', $examinations);
    }

    public function getPrescription()
    {
        //$prescriptions = PrescriptionExam::all(); //Get all prescriptions
        $id = auth()->user()->id;
        $doctor = Doctor::where('user_id', '=' ,$id)->first();
        $prescriptions = PrescriptionExam::where('doctor_id', $doctor->id)
                                        ->orderby('created_at', 'desc')
                                        ->get();

        return view('examinations.checkprescription', compact('prescriptions'));
    }

    public function addExamination($id)
    {
        $prescription = PrescriptionExam::findOrFail($id);

        $date_now = Carbon::now()->toDateString();

        return view('examinations.create', compact('prescription', 'date_now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'prescription_id' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
        ]);

        if ($request->hasfile('examination_picture')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('examination_picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('examination_picture')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('examination_picture')->storeAs('public/examination_files', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $examination = new Examination();
        $examination->prescription_id = $request->input('prescription_id');
        $prescription = PrescriptionExam::findOrFail($examination->prescription_id);
        $examination->prescription = $prescription->prescription;
        $examination->examination_picture = $fileNameToStore;
        $examination->date = $request->input('date');
        $examination->result = $request->input('result');

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
        
        $examination->status = $request->input('status');

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'Examination';
        $historique->user_id = auth()->user()->id;

        $examination->save();
        $historique->save();

        //Redirect to the users.index view and display message
        return redirect()->route('examinations.index')
            ->with('success',
             'Nouvel Examen ajouté avec succès.'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $examination = Examination::findOrFail($id); //Find examination of id = $id

        $doctor = Doctor::findOrFail($examination->doctor_id);
        $service = $doctor->department_name;

        return view('examinations.show', compact('examination','service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examination = Examination::findOrFail($id); //Find examination of id = $id

        return view('examinations.edit', compact('examination'));
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
        $examination = Examination::findOrFail($id);

        $this->validate($request, [
            'prescription_id' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
        ]);

        if ($request->hasfile('examination_picture')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('examination_picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('examination_picture')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('examination_picture')->storeAs('public/examination_files', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $examination->prescription_id = $request->input('prescription_id');
        $prescription = PrescriptionExam::findOrFail($examination->prescription_id);
        $examination->prescription = $prescription->prescription;
        if ($request->hasfile('examination_picture')) {
            $examination->examination_picture = $fileNameToStore;
        }
        $examination->date = $request->input('date');
        $examination->result = $request->input('result');

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
        $examination->status = $request->input('status');

        $historique = new Historique();
        $historique->action = 'Update';
        $historique->table = 'Examination';
        $historique->user_id = auth()->user()->id;

        $examination->save();
        $historique->save();

        //Redirect to the users.index view and display message
        return redirect()->route('examinations.index')
            ->with('success',
             'Examen édité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examination = Examination::findOrFail($id); //Find examination of id = $id

        if ($examination->examination_picture != 'noimage.jpg') {
            Storage::delete('public/profile_images/'.$examination->examination_picture);
        }
        $examination->delete();

        return redirect()->route('examinations.index')
            ->with('success',
             'Examen supprimée avec succès.');
    }
}
