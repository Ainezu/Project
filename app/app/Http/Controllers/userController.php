<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Text;
use App\Like;

class userController extends Controller
{
    //ユーザーデータ取得・表示
    public function useredit(int $id){
    $user = new User;
    $user_date = $user->find($id);

        return view('user_edit',[      
           'user_date' => $user_date,
        ]);
    }
    public function overwrite(int $id,Request $request){
        $user = new User;
        $user_date = $user->find($id);

        $user_date -> name = $request -> name;
        $user_date -> email = $request -> email;

        $user_date -> save();

        return redirect("mypage/".$id);
    }

    //ユーザーデータ削除
    public function delete(int $id){
        $user = new User;
        $date = $user
                ->where('id',$id)
                ->delete();
        $text = new Text;
        $pic = $text
                ->where('user_id',$id)
                ->delete();

        return view('user_delete',[

        ]);
    }

    //投稿削除
    public function postdelete(int $id){
        $text = new Text;
        $post = $text
                ->where('id',$id)
                ->delete();
        
        return redirect('/');
    }
}
