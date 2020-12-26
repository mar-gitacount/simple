<?php

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use App\Models\Voting;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

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

Route::get('/', function () {
    /* Votingモデルを全て取得してトップページに表示する。 */
    $votings = Voting::all();
    return view('votings', ['votings' => $votings]);
})/* ->middleware('auth') */;
/* ログインするとトップページにいくこれをつかってマイページいける処理を書く */


Route::post('/voting', function (Request $request) {
    /* 有効なデータが入っているかどうかを確認するためにvalidatorを使う */
    /* $requestから全てのデータを取得するその中のnameの属性に条件を指定する*/
    $validator = Validator::make($request->all(), [
        /* 入力必須255文字 form のnameパラメータを設定する*/
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);    
    }
    
    
    /* votingモデルに新しいオブジェクトを追加する */
    
    $voting = new Voting;
    /* votingモデルのtitleに$request->nameを格納する。 */
    $voting->name = $request->name;
    //saveメソッド
    $voting->save();
    /* トップページにリダイレクトして置く */
    return redirect('/');
});


Route::delete('/voting/{voting}',function(Voting $voting){
    $voting->delete();
    /* トップページに置く */
    return redirect('/');
});
/** 
 * 第一引数でuriに接続してhomeControllerを呼び出してdestoroyメソッドを利用する 
 *  index関数にuser情報かwithでひとまとめに渡されているはず!!
 * 
 * */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')/* rootで利用できるname設定 */;
/**
 * {}の中はコントローラの引数か
 */
Route::delete('/home',[App\Http\Controllers\UserController::class, 'destroy'])->name('user_delete')->middleware('auth');
/**
 * 下記テスト
 * 
*/

Auth::routes();
/* getを使い第一引数で/homeに接続したとき第二引数ホームコントローラを呼びその中のindexクラスを使う 
*indexクラスはユーザーのビューを返す
*homeurlをよびだしてそこに
*/
/**
 * ユーザ記事を作成するページを作成する。
 * 1.記事createテーブルの作成
 * 2.まずは表示できるようにする。
 *  */
Route::get('/article', [App\Http\Controllers\ArticleController::class, 'article'])->name('article')->middleware('auth');

