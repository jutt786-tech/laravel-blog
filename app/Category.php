<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['nam'];

    public function posts(){
        return $this->hasMany('App\Post');

    }

    public function products()
    {
        return $this->belongsToMany('App\Products');
    }



}


