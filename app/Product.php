<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected  $fillable = ['p_name'];

    public function categorys()
    {
        return $this->belongsToMany('App\Category');
    }

}
