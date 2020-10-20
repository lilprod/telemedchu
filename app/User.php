<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use App\Notification;
use App\Examination;
use App\Message;
use App\Patient;
use App\Post;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasRoles,Notifiable,HasApiTokens;

    protected $guard_name = 'web';

    /**
    * Hand
    */
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'firstname', 'email', 'password', 'phone_number', 'address', 'user_profession','gender', 'birth_date',
        'place_birth','nationality','ethnic_group' ,'blood_group' ,'rhesus' ,'profile_picture','role_user','last_activity'
    ];

    protected $dates = ['last_activity'];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A user can have many messages
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    /* public function messages()
    {
        return $this->hasMany(Message::class);
    } */

    public function messages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function notifications()
    {
        return Notification::where('receiver_id', $this->id)->get();
    }

    public function prescriptions()
    {
        return $this->hasMany('App\Prescription');
    }

    public function biologies()
    {
        return $this->hasMany('App\PrescriptionExam');
    }

    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }

    public function myconsultations()
    {
        return $this->hasMany('App\Consultation');
    }

    public function mypatients()
    {
        return Patient::where('doctor_userId', $this->id)->get();
    }

    public function examinations()
    {
        return $this->hasMany('App\Examination');
    }

    public function posts()
    {
        //return $this->hasMany('App\Post');
        return Post::where('user_id', $this->id)
                            ->orderBy('id', 'DESC')
                            ->get();
    }

    public function myappointments()
    {
        return $this->hasMany('App\Appointment');
    }

    public function badge(){
        $messages = Message::whereIn('sender_id', array(auth()->user()->id, $this->id))
        ->whereIn('receiver_id', array(auth()->user()->id, $this->id))
        ->where('status', 1)
        ->get();

        $lastMessage = Message::whereIn('sender_id', array(auth()->user()->id, $this->id))
                    ->whereIn('receiver_id', array(auth()->user()->id, $this->id))
                    ->orderBy('id', 'desc')
                    ->first();
        if($lastMessage){
            if($lastMessage->receiver_id != $this->id){
                return $messages->count();
            }
        }
       
        return 0;
    }

    public function isOnline(){
        if($this->last_activity){
            $lastActivity = strtotime($this->last_activity);
            $now = strtotime(Carbon::now()->format('Y-m-d H:i:s'));
            $difference = ($now - $lastActivity) / 60;
            if($difference <= 1){
                return true;
            }
        }
       return false;
    }

    public function formatLastActivity(){
        if($this->last_activity){
            if($this->last_activity->format('Y-m-d') == Carbon::now()->format('Y-m-d')){
                return "aujourd'hui à ".$this->last_activity->format('H:i');
            }else if($this->last_activity->diff(Carbon::now())->days == 1){
                return "hier à ".$this->last_activity->format('H:i');
            }
            return $this->last_activity->format('d-m-Y')." à ".$this->last_activity->format('H:i');
        }
        return '';
    }

    /*public function allChatMsg(){
        return Message::where('receiver_id', $this->id)->where('status', 1)->count();
    }*/
    
    public function allChatMsg(){
        return Message::where('to_id', $this->id)->where('seen', 0)->count();
    }

    public function sendExam(){
        return Examination::where('doctor_userId', $this->id)->where('status', 0)->count();
    }
    
}
