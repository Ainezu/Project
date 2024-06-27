<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class firstController extends Controller
{
    //home画面
    public function index(){
        return view('home');
    }
}
