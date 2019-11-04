<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name','government_body_id'];

    public function governmentBody()
    {
        return $this->belongsTo('App\GovernmentBody');
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
