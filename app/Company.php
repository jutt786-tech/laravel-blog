<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

//    protected $guarded = [];
    protected  $fillable = ['cname','branch_id'];

    public function branches(){

     return $this->belongsToMany('App\Branch');
    }
}
