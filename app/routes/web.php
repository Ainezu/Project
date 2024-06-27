<?php
use App\Http\Controllers\firstController;

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
Route::get('/',[firstController::class,'index']);