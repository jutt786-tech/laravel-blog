<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $guarded = [];
//      protected  $fillable = ['cname'];
//        protected $guarded= [];

    public function branches(){

     return $this->hasMany('App\Branch');
    }
}
