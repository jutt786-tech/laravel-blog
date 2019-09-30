<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = [];

    public  function branch(){

         return $this->belongsTo('App\Branch');
    }

    public  function hours(){

        return $this->hasMany('App\Hour');
    }
}
