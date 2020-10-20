<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = [
        'name','medecine_family', 'form', 'dosage', 'presentation', 'observation',
    ];
}
