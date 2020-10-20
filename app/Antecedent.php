<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antecedent extends Model
{
    protected $fillable = [
        'medical_history','family_history','surgical_history','allergy','patient_id','user_id'
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
