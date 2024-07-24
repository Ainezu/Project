<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//使用するModel
use App\User;
use App\Text;
use App\Like;

class adminController extends Controller
{
    //管理者用ページの表示
    public function adminform(){

        return view('admin/admin', [      
            
        ]);
    }

    public function adminresult(Request $request){
        $text = new Text;
        $user = new User;
        $user_id =  Auth::user()->id;

        $search = $request -> search;//検索種類
        $search_word = $request ->word;//検索ワード
        $user_date = $user->find($user_id);
        if(!empty($search_word)){
            if($search == '1'){//ユーザー検索
                $result = $user
                            ->where('name','LIKE','%{$search_word}%')
                            ->get();
            } else{//投稿検索
                $result = $text
                            ->where('title','LIKE','%{$search_word}%')
                            ->get();
            }
        } else{
            if($search == '1'){//ユーザー検索
                $result = $user;
            } else{//投稿検索
                $result = $text;
            }
        }
        $post =  $text
                    ->where('user_id','=',$user_id)
                    ->where('open','=','1')
                    ->get()
        $open_count = count($post);


        return back()->with([
            'search' => $search,
            'result' => $result,
            'open_count' => $open_count,
        ]);
    }
}
