<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Patient;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfilController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profils.myprofil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function setting()
    {
        return view('profils.setting');
    }

    public function editProfil()
    {
        return view('profils.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate name, email and password fields
        $this->validate($request, [
            'name' => 'required|max:120',
            'firstname' => 'required|max:120',
            'email' => 'required|email',
            'address' => 'required',
            'phone_number' => 'required',
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
            $fileNameToStore = 'noimage.jpg';
        }

        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);

        $name = $request->input('name');
        $firstname = $request->input('firstname');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone_number = $request->input('phone_number');

        if($user->role_user == 1){

            $patient = Patient::where('user_id', $user->id)->first();
            $user->name = $name;
            $user->firstname = $firstname;
            $user->email = $email;
            $user->address = $address;
            $user->phone_number = $phone_number;
            if ($request->hasfile('profile_picture')) {
                $user->profile_picture = $fileNameToStore;
            }

            $patient->name = $name;
            $patient->firstname = $firstname;
            $patient->email = $email;
            $patient->address = $address;
            $patient->phone_number = $phone_number;
            if ($request->hasfile('profile_picture')) {
                $patient->profile_picture = $fileNameToStore;
            }

            $user->save();
            $patient->save();

        }elseif($user->role_user == 2){

            $doctor = Doctor::where('user_id', $user->id)->first();
            $user->name = $name;
            $user->firstname = $firstname;
            $user->email = $email;
            $user->address = $address;
            $user->phone_number = $phone_number;
            if ($request->hasfile('profile_picture')) {
                $user->profile_picture = $fileNameToStore;
            }

            $doctor->name = $name;
            $doctor->firstname = $firstname;
            $doctor->email = $email;
            $doctor->address = $address;
            $doctor->phone_number = $phone_number;
            if ($request->hasfile('profile_picture')) {
                $doctor->profile_picture = $fileNameToStore;
            }
            $user->save();
            $doctor->save();
        }else{

            $user->name = $name;
            $user->firstname = $firstname;
            $user->email = $email;
            $user->address = $address;
            $user->phone_number = $phone_number;
            if ($request->hasfile('profile_picture')) {
                $user->profile_picture = $fileNameToStore;
            }

            $user->save();

        }
        
        return redirect('profils')->with('success', 'Profil mis à jour');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    public function updatePassword(Request $request)
    {
        //Validate password fields
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);

        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id); //Get user specified by id

        $user->password = $request->input('password');
        $user->save();

        return redirect('profils')->with('success', 'Mot de passe mis à jour');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
