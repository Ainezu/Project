<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ['title','imgage','open','comment'];
    //
    public function User(){
        return $this->belingsTo('App\User','user_id','id');
    }
    public function Like(){
        return $this->hasMany('App\Like','text_id','id');
    }
}
