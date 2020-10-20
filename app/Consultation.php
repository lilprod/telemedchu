<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'patient_name', 'patient_firstname', 'patient_email','patient_phone', 'patient_address', 'birth_date',
        'height', 'imc', 'weight','pulse','temperature','blood_pressure','reason','diagnostic','patient_id','doctor_id',
        'age', 'gender', 'patient_profession', 'doctor_name', 'doctor_firstname', 'doctor_email','doctor_phone', 'doctor_address', 'doctor_profession', 
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function doctor()
    {
        return $this->belongsTo('App\User');
    }
}
