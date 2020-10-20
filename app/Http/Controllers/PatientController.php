<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use App\Patient;
use App\Historique;
use Illuminate\Support\Facades\Storage;
use App\Biometry;
use App\Antecedent;
use App\Doctor;

class PatientController extends Controller
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
        //Get all patients and pass it to the view
        $patients = Patient::all();

        return view('patients.index')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        
        return view('patients.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate name, email and password fields
        $this->validate($request, [
            'name' => 'required|max:120',
            'firstname' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            //'password' => 'required|min:6|confirmed',
        ]);

        if ($request->hasfile('profile_picture')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('profile_picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('profile_picture')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'avatar.jpg';
        }

        $patient = new Patient();
        $patient->name = $request->input('name');
        $patient->firstname = $request->input('firstname');
        $patient->email = $request->input('email');
        $patient->gender = $request->input('gender');
        $patient->marital_status = $request->input('marital_status');
        $patient->profile_picture = $fileNameToStore;
        $patient->phone_number = $request->input('phone_number');
        $patient->address = $request->input('address');
        $patient->birth_date = $request->input('birth_date');
        $patient->place_birth = $request->input('place_birth');
        $patient->nationality = $request->input('nationality');
        $patient->ethnic_group = $request->input('ethnic_group');
        $patient->blood_group = $request->input('blood_group');
        $patient->rhesus = $request->input('rhesus');
        $patient->profession = $request->input('profession');
        $patient->age = $request->input('age');
        $patient->status = $request->input('status');
        $patient->doctor_id = $request->input('doctor_id');

        $doctor = Doctor::findOrFail($patient->doctor_id);
        $patient->doctor_name = $doctor->name;
        $patient->doctor_firstname = $doctor->firstname;
        $patient->doctor_email = $doctor->email;
        $patient->doctor_gender = $doctor->gender;
        $patient->doctor_phone = $doctor->phone_number;
        $patient->doctor_address = $doctor->address;
        $patient->doctor_profession = $doctor->profession;
        $patient->department_id = $doctor->department_id;
        $patient->department_name = $doctor->department_name;
        $patient->create_user_id = auth()->user()->id;

        $user = new User();
        $user->name = $request->input('name');
        $user->firstname = $request->input('firstname');
        $user->email = $request->input('email');
        //$user->password = $request->input('password');
        $user->password = 123456;
        $user->profile_picture = $fileNameToStore;
        $user->user_profession = $request->input('profession');
        $user->phone_number = $request->input('phone_number');
        $user->gender = $request->input('gender');
        $user->birth_date = $request->input('birth_date');
        $user->address = $request->input('address');
        $user->role_user = 1;

        $patient->save();
        $user->save();

        $user()->assignRole('Patient');

        $historique = new Historique();
        $historique->action = 'Create';
        $historique->table = 'User/Patient';
        $historique->user_id = auth()->user()->id;
        
        $patient = Patient::findOrFail($patient->id);
        $patient->user_id = $user->id;

        $patient->save();
        $historique->save();

        //Redirect to the users.index view and display message
        return redirect()->route('patients.show', $patient->id)
            ->with('success',
             'Nouveau Patient ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::findOrFail($id); //Get patient with specified id

        $biometries = $patient->biometries;

        $consultations = $patient->consultations;

        $antecedents = $patient->antecedents;

        return view('patients.show', compact('patient', 'biometries', 'antecedents','consultations')); //pass patient data to view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id); //Get patient with specified id

        $doctors = Doctor::all();

        return view('patients.edit', compact('patient', 'doctors')); //pass patient data to view
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
        $patient = Patient::findOrFail($id); //Get role specified by id

        //Validate name, email and password fields
        $this->validate($request, [
            'name' => 'required|max:120',
            'firstname' => 'required|max:120',
            'email' => 'required|email|unique:patients,email,'.$id,
            //'password' => 'required|min:6|confirmed',
            'phone_number' => 'required',
            'address' => 'required',
            'profile_picture' => 'image|nullable',
        ]);

        if ($request->hasfile('profile_picture')) {
            // Get filename with the extension
            $fileNameWithExt = $request->file('profile_picture')->getClientOriginalName();

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $extension = $request->file('profile_picture')->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('profile_picture')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'avatar.jpg';
        }

        $patient->name = $request->input('name');
        $patient->firstname = $request->input('firstname');
        $patient->email = $request->input('email');
        $patient->gender = $request->input('gender');
        if ($request->hasfile('profile_picture')) {
            $patient->profile_picture = $fileNameToStore;
        }
        $patient->phone_number = $request->input('phone_number');
        $patient->address = $request->input('address');
        $patient->birth_date = $request->input('birth_date');
        $patient->place_birth = $request->input('place_birth');
        $patient->nationality = $request->input('nationality');
        $patient->marital_status = $request->input('marital_status');
        $patient->ethnic_group = $request->input('ethnic_group');
        $patient->blood_group = $request->input('blood_group');
        $patient->rhesus = $request->input('rhesus');
        $patient->profession = $request->input('profession');
        $patient->age = $request->input('age');
        $patient->status = $request->input('status');
        $patient->doctor_id = $request->input('doctor_id');

        $doctor = Doctor::findOrFail($patient->doctor_id);
        $patient->doctor_name = $doctor->name;
        $patient->doctor_firstname = $doctor->firstname;
        $patient->doctor_email = $doctor->email;
        $patient->doctor_gender = $doctor->gender;
        $patient->doctor_phone = $doctor->phone_number;
        $patient->doctor_address = $doctor->address;
        $patient->doctor_profession = $doctor->profession;
        $patient->department_id = $doctor->department_id;
        $patient->department_name = $doctor->department_name;
        $patient->create_user_id = auth()->user()->id;

        $user = User::findOrFail($patient->user_id);

        $user->name = $request->input('name');
        $user->firstname = $request->input('firstname');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->user_profession = $request->input('profession');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        $user->birth_date = $request->input('birth_date');
        $user->role_user = 1;
        if ($request->hasfile('profile_picture')) {
            $user->profile_picture = $fileNameToStore;
        }

        $patient->save();
        $user->save();
        
        $historique = new Historique();
        $historique->action = 'Update';
        $historique->table = 'User/Patient';
        $historique->user_id = auth()->user()->id;
		
		$historique->save();

        return redirect()->route('patients.show', $patient->id)
            ->with('success',
             'Patient '.$patient->name.' edité avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $user = User::findOrFail($patient->user_id);
        $antecedent = Antecedent::findOrFail($patient->antecedent_id);
        $biometry = Biometry::findOrFail($patient->biometry_id);

        if ($user->profile_picture != 'avatar.jpg') {
            Storage::delete('public/cover_images/'.$user->profile_picture);
        }

        $historique = new Historique();
        $historique->action = 'Delete';
        $historique->table = 'User/Patient/Biometry/Antecedent';
        $historique->user_id = auth()->user()->id;

        $user->delete();
        $patient->delete();
        $biometry->delete();
        $antecedent->delete();
        $historique->save();

        return redirect()->route('patients.index')
            ->with('success',
             'Patient supprimé avec succès.');
    }

    
}
