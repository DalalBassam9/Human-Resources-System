<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name','image','department_id'];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
