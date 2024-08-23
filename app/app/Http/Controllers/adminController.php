<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateDate;

//使用するModel
use App\User;
use App\Text;
use App\Like;

class adminController extends Controller
{
    //管理者用ページの表示
    public function adminform(){
        $admin =  Auth::user()->role;
        if(is_null($admin )){
            return view('error',[

            ]);
        }
        return view('admin/admin',[      
           
        ]);
    }
    //検索画面選択
    public function adminchoice(CreateDate $request){
        
        if($request -> has('user') ){
            return view('admin/admin-usersearch',[
            ]);
        } else {
            return view('admin/admin-postsearch',[
            ]);
        }
    }
    //ユーザー検索
    public function usersearch(CreateDate $request){
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
    //ユーザー削除
    public function userdelete(int $id){
        $user = new User;
        $user = $user
                ->find($id)
                ->delete();
        $text = new Text;
        $text = $text
                ->where('user_id','=',$id)
                ->delete();
        
        return redirect('admin');
    }  
    //投稿検索
    public function postsearch(CreateDate $request){
        $text = new Text;

        $search_word = $request ->word;//検索ワード→ok
        if(empty($search_word)){//検索ワードが空の時
            $result = $text
                        ->select('texts.id','users.name','texts.title','texts.created_at','texts.open')
                        ->join('users','texts.user_id','=','users.id')
                        ->get();
        } else{
            $result = $text
                        ->select('texts.id','users.name','texts.title','texts.created_at','texts.open')
                        ->join('users','texts.user_id','=','users.id')
                        ->where('texts.title','LIKE',"%{$search_word}%")
                        ->orWhere('texts.comment','LIKE',"%{$search_word}%")
                        ->orWhere('users.name','LIKE',"%{$search_word}%")
                        ->get();
        }
  
        return view('admin/admin-postsearch',[
            'search_word'=> $search_word,
            'result' => $result,
        ]);       
    } 
    //投稿削除
    public function postdelete(int $id){
        $text = new Text;
        $text = $text
                    ->find($id)
                    ->delete();
        
        return redirect('admin');
    }   
}
