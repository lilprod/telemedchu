<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescribedDrug extends Model
{
    protected $fillable = [
        'prescription_id', 'patient_id', 'doctor_id', 'medication_id','medication_name','medecine_family',
        'form','dosage','presentation','observation','prescription',
    ]; 

    public function prescription()
    {
        return $this->belongsTo('App\Prescription');
    }
}
