<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public function prescribeddrugs()
    {
        return $this->hasMany('App\PrescribedDrug');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
