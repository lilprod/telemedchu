<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypePrescription extends Model
{
    protected $fillable = [
        'title', 'description', 
    ];
}
