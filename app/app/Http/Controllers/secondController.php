<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//使用するModel
use App\User;
use App\Text;
use App\Like;

class secondController extends Controller
{
    //検索ボタン->search.blade表示
    public function indication(Request $request){
        $word = $request->input('word');
        $text = new Text;

        $research = $text
                    ->where('open','=','1')
                    ->get();
        
        if(!empty($word)){
            $reseach = $text
                   -> where('open','=','1')
                   -> where('title','LIKE',"%{$word}%")
                   -> orWhere('comment','LIKE',"%{$word}%")
                   -> get();
        }

        return view('search', [
            'word' => $word,
            'research' => $research,
        ]);
    }
    //投稿ページ表示
    public function postform(){
        $user_id =  Auth::user()->id;
        
        return view('post', [      
            'user_id' => $user_id,
        ]);
    }
    //投稿登録
    public function postdateedit(Request $request){
        $texts = new Text;
        $user_id =  Auth::user()->id;

        //publicにデータを保存
        $file_name = $request->file('image_file')->getClientOriginalName();
        $request->file('image_file')->storeAs('' , $file_name);

        $text_check = $texts
                        ->where('user_id','=',$user_id)
                        ->where('image','=',$file_name)
                        ->get();
        $text_count = count($text_check);

        if($text_count == '0'){            
        $texts -> title = $request -> title;
        $texts -> image = $file_name;
        $texts -> open = $request -> open;
        $texts -> user_id = $request -> user_id;
        $texts -> comment = $request -> comment;

        $texts->save();
         
        return back();
        } else {
            session()->flash('message', 'すでに登録されている画像です。');
            return back();
        } 
    }
    //詳細ページ表示
    public function browsing(int $id){
        $user = new User;
        $text = new Text;
        $like = new Like;

        $result = $text->find($id);
        $user_id = $result['user_id'];
        $text_id = $result['id'];

        $user_record = $user->find($user_id);

        //お気に入り登録がされているか
        $like = $like
                ->where('user_id','=',$user_id)
                ->where('text_id','=',$text_id)
                ->get();

        $like_product = count($like);

        return view('browsing',[
            'result' => $result,
            'user_name' => $user_record, 
            'like_product' => $like_product,       
        ]);
    }

    //ユーザーデータの表示
    public function userdate(int $user_id){
        $user = new User;
        $text = new Text;

        $user_date = $user->find($user_id);
        $text_date = $text
                    ->where('user_id','=',$user_id)
                    ->where('open','=','1')
                    ->get();
        $text_count = count($text_date);

        return view('user_page',[
            'user_date' => $user_date,
            'text_date' => $text_date,
            'text_count' => $text_count,
        ]);
    }
    //マイデータの表示
    public function mydate(int $user_id){
        $user = new User;
        $text = new Text;
        $like = new Lile;

        $user_date = $user->find($user_id);
        $text_date = $text
                    ->where('user_id','=',$user_id)
                    ->get();
        $text_count = count($text_date);
        $like_date = $like
                    ->where('user_id','=',$user_id)
                    ->get();
        $like_count = count($like_date);

        return view('my_page',[
            'user_date' => $user_date,
            'text_date' => $text_date,
            'text_count' => $text_count,
            'like_count' => $like_count,
        ]);
    }
}
