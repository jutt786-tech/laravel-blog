<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = [];

    public  function branches(){

         return $this->belongsTo('App\Branch');
    }


}
