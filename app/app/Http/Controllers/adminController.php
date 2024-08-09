<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//使用するModel
use App\User;
use App\Text;
use App\Like;

class adminController extends Controller
{
    //管理者用ページの表示
    public function adminform(){
        
        return view('admin/admin',[      
           
        ]);
    }
    //検索画面選択
    public function adminchoice(Request $request){
        
        if($request -> has('user') ){
            return view('admin/admin-usersearch',[
            ]);
        } else {
            return view('admin/admin-postsearch',[
            ]);
        }
    }
    //ユーザー検索
    public function usersearch(Request $request){
        $user = new User;
        $all_user = $user->get();
        $text = new Text;
        $like = new Like;
                               
        $search_word = $request ->word;//検索ワード→ok
        if(empty($search_word)){//検索ワードが空の時
            $result = $user
                    ->select('users.id','users.name')
                    ->withCount('text')
                    ->withCount('open')
                    ->withCount('like')
                    ->get();
        } else{
            $result = $user
                        ->select('users.id','users.name')
                        ->where('users.name','LIKE',"%{$search_word}%")
                        ->withCount('text')
                        ->withCount('open')
                        ->withCount('like')
                        ->get();
        }

        return view('admin/admin-usersearch',[
            'search_word'=> $search_word,
            'result' => $result,
        ]);      
    }
    //投稿検索
    public function postsearch(Request $request){
        $text = new Text;

        $search_word = $request ->word;//検索ワード→ok
        if(empty($search_word)){//検索ワードが空の時
            $result = $text
                        ->select('id','user_name','title','created_at','open')
                        ->get();
        } else{
            $result = $text
                        ->select('id','user_name','title','created_at','open')
                        ->where('title','LIKE',"%{$search_word}%")
                        ->orWhere('comment','LIKE',"%{$search_word}%")
                        ->orWhere('user_name','LIKE',"%{$search_word}%")
                        ->get();
        }
  
        return view('admin/admin-postsearch',[
            'search_word'=> $search_word,
            'result' => $result,
        ]);       
    }

    //戻る
    
}
