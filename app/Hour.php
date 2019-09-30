<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    //
    protected $guarded = [];
    public  function contacts(){

        return $this->belongsTo('App\Contact');
    }
}
