<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 'description', 'status', 'user_id',
    ];

    public function doctors()
    {
        return $this->hasMany('App\Doctor');
    }
}
