<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GovernmentBody extends Model
{
    protected $fillable = ['name'];

    public function departments()
    {
        return $this->hasMany('App\Department');
    }
}
