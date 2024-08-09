<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\admin;
use App\Http\Controllers\firstController;
use App\Http\Controllers\secondController;
use App\Http\Controllers\userController;
use App\Http\Controllers\favoriteController;
use App\Http\Controllers\adminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::送信方法('URL',[使用するｺﾝﾄﾛｰﾗｰ::class, 'ﾒｿｯﾄﾞ(処理)名'])

//ログイン関連のルーティングの呼び出し
Auth::routes();

//home画面
Route::get('/',[firstController::class,'index'])->name('home');
//検索結果表示
Route::get('/search',[secondController::class,'indication'])->name('indication.search');

//投稿情報登録
Route::post('/post',[secondController::class,'postdateedit']);
//詳細画面表示
Route::get('/detail/{id}',[secondController::class,'browsing'])->name('browsing.detail');
//ユーザーページ表示
Route::get('/userpage/{user_id}',[secondController::class,'userdate'])->name('userdate.edit');

//ログイン認証できている場合のみ実行
Route::group(['middleware' => 'auth'], function(){
    //投稿画面表示
    Route::get('/post',[secondController::class,'postform'])->name('postform.edit');
    //いいね機能
    Route::post('/detail/{id}', [favoriteController::class,'like'])->name('favorite'); 
    //マイページ表示
    Route::get('/mypage/{user_id}',[secondController::class,'mydate'])->name('mydate.edit');
    //ユーザーデータ編集
    Route::get('edit/{id}', [userController::class,'useredit'])->name('date.edit');
    Route::post('edit/{id}',[userController::class,'overwrite']);
    //ユーザー削除
    Route::get('delete/{id}',[userController::class,'delete'])->name('date.delete');
    //投稿削除
    Route::get('post/delete/{id}',[userController::class,'postdelete'])->name('post.delete');
});

//管理者のみアクセス可能
Route::group(['middlewareAliases' => 'admin'],function(){
    //検索選択
    Route::get('/admin',[adminController::class,'adminform'])->name('admin.form');
    //検索フォーム
    Route::post('/admin/search',[adminController::class,'adminchoice'])->name('admin.choice');
    //ユーザー検索
    Route::post('admin/usersearch',[adminController::class,'usersearch'])->name('user.search');
    //投稿検索
    Route::post('admin/postsearch',[adminController::class,'postsearch'])->name('post.search');
});