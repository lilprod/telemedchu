<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone_number' => ['required', 'string', 'min:8'],
            'address' => ['required', 'string'],
            'user_profession' => ['required', 'string'],
            'gender' => ['required'],
            'birth_date' => ['required'],
            'place_birth' => ['required', 'string'],
            'nationality' => ['required'],
            'ethnic_group' => ['required'],
            /*'blood_group' => ['required', 'string'],
            'rhesus' => ['required', 'string'],*/
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'name' => $data['name'],
            'firstname' => $data['firstname'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'user_profession' => $data['user_profession'],
            'birth_date' => $data['birth_date'],
            'place_birth' => $data['place_birth'],
            'nationality' => $data['nationality'],
            'ethnic_group' => $data['ethnic_group'],
            'blood_group' => $data['blood_group'],
            'rhesus' => $data['rhesus'],
            'profile_picture' => 'avatar.jpg',
            'role_user' => 1,
        ]);

        $user->assignRole('Patient');

        $patient = new Patient();
        $patient->name = $data['name'];
        $patient->firstname = $data['firstname'];
        $patient->email = $data['email'];
        $patient->phone_number = $data['phone_number'];
        $patient->address =$data['address'];
        $patient->profession = $data['user_profession'];
        $patient->gender = $data['gender'];
        $patient->birth_date = $data['birth_date'];
        $patient->place_birth = $data['place_birth'];
        $patient->nationality = $data['nationality'];
        $patient->ethnic_group = $data['ethnic_group'];
        $patient->blood_group = $data['blood_group'];
        $patient->rhesus = $data['rhesus'];
        $patient->profile_picture = 'avatar.jpg';
        $patient->status = 0;
        $patient->user_id = $user->id;

        $patient->save();
        return $user;
    }
}
