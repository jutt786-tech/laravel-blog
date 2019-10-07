<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected  $guarded = [];
//    protected $fillable = ['bname', 'location', 'company_id'];

    public  function  company(){
       return $this->belongsTo('App\Company');
    }


    public  function  contact(){
       return $this->hasMany('App\Contact');
    }

    public function hours()
    {
        return $this->hasMany('App\Hour');
    }
}
