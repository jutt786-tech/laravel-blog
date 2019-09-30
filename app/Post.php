<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title', 'body', 'img', 'user_id', 'category_id'
    ];
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');

    }

//    public function upost()
//    {
//        return $this->hasManyThrough(
//            'App\User',
//            'App\Category'
//        );
//    }



}
