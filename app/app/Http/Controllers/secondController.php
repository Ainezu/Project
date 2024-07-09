<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class secondController extends Controller
{
    //検索ボタン->search.blade表示
    public function indication(Request $request){
        $word = $request->input('word');


        return view('search', [
            'word' => $word,
        ]);
    }

    //詳細ページ表示
    public function browsing(){

        return view('browsing',[

        ]);
    }

    //ユーザーデータの表示
    public function userdate(){

        return view('user_page',[

        ]);
    }
}
