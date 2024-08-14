<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CreateDate;

use App\Text;
use App\Like;
use App\User;


class favoriteController extends Controller
{
    //お気に入り
    public function like(CreateDate $request){

        if ( $request->input('like_product') == 0) {
            //ステータスが0のときはデータベースに情報を保存
            Like::create([
                'text_id' => $request->input('text_id'),
                'user_id' => auth()->user()->id,
            ]);
           //ステータスが1のときはデータベースに情報を削除
        } elseif ( $request->input('like_product')  == 1 ) {
            Like::where('text_id', "=", $request->input('text_id'))
                ->where('user_id', "=", auth()->user()->id)
                ->delete();
        }
        return  $request->input('like_product');
    }

    //Log::debug('like_product');
}

