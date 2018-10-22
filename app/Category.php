<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public function posts(){
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

    //childs
    public function childs(){
        return $this->hasMany('App\Category','parent_id','id');
    }
}
