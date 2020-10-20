<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biometry extends Model
{
    protected $fillable = [
        'height', 'weight','rhesus','blood_group','imc','pulse','blood_pressure','temperature','biological_indicator','patient_id','user_id'
    ];
    
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
