<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $fillable = ['text_id','user_id'];

    public function User(){
        return $this->belingsTo('App\User','user_id','id');
    }
    public function Text(){
        return $this->belingsTo('App\Text','text_id','id');
    }
}
