<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $guarded = [];

    public  function  companys(){
       return $this->belongsToMany('App\Company');
    }


    public  function  contact(){
       return $this->hasMany('App\Contact');
    }

    public function hours()
    {
        return $this->hasManyThrough('App\Hour', 'App\Contact');
    }
}
