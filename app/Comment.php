<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];
    public function ticket(){
//        thuộc về
        return $this->belongsTo('App\Ticket');
    }
}
