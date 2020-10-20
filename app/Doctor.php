<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Consultation;

class Doctor extends Model
{
    protected $fillable = [
        'name', 'firstname', 'phone_number', 'address', 'gender', 'birth_date', 'biography','profile_picture',
        'status', 'user_id'
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function patients()
    {
        return $this->hasMany('App\Patient');
    }

    public function consultations()
    {
        return Consultation::where('doctor_id', $this->id)->get();
    }
}
