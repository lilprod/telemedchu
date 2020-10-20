<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'firstname', 'phone_number', 'address', 'age', 'gender', 'birth_date', 'place_birth', 'profession',
        'ethnic_group', 'marital_status', 'blood_group', 'rhesus', 'profile_picture', 'status', 'user_id', 'create_user_id'
    ];

    public function prescriptions()
    {
        return $this->hasMany('App\Prescription');
    }

    public function biologies()
    {
        return $this->hasMany('App\PrescriptionExam');
    }

    public function biometries()
    {
        return $this->hasMany('App\Biometry');
    }

    public function consultations()
    {
        return $this->hasMany('App\Consultation');
    }

    public function antecedents()
    {
        return $this->hasMany('App\Antecedent');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
