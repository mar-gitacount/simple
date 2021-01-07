<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
class ArticleController extends Controller
{
    
    
    public function __construct() {
        /* articleに行くときは認証判定 */
        $this->middleware('auth');
    }
    
    
    

    public function index()
    {
      
    } 
    

    public function store(Request $request){
        $article = new Article();
        /** 
        * バリデーションを設定する。
        */
        $validator = Validator::make($request->all(), [
            /* 入力必須255文字 form のarticleのバリデーションチェック*/
            'article' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/article')
                ->withInput()
                ->withErrors($validator);    
        }
        /**
         * 以下はブレードファイルのarticleのnameを指定して値をとっている。
         * この処理はarticleの内容を保存している。
         * ->articleはカラム
         * articleのidが表示される。
         */  
        $article->user_id = $request->user()->id;
        /**
         * 上記の$article->user_idはarticleのユーザーid格納カラム。
         *articleのタイトルをテーブルから呼び出して$article->article_title 
        */
        $article->article = $request->article;
        /**articleが投稿された時点でidは発行されているのでそこに紐づけしたい。
         * 例:
         * "user_id" => 3
         * "article" => "ｄｄ"
         * "updated_at" => "2021-01-05 03:11:39"
         * "created_at" => "2021-01-05 03:11:39"
         * "id" => 34←これをURLにする。
         * 
        */  
        $article->save();    
        return redirect(("/home"));
    }



    public function article(){
        /**
         * 以下でarticle.blade.phpを表示している。
         * blade.phpを表示するという意味なのかblade.phpに表示するという意味なのか、、おそらく前者
         * 追加などの処理をブレードファイル内に書き加える。
         * articleの作成ページの処理。
         *  */  
        return view("article");
    } 
    
    public function show($id){
        /** 
         * return viewで投稿ページ/{投稿id}にする。
         * articleshow.blade.phpを作る。
        */
        $article = Article::findOrFail($id);
        /** 
         * 以下でbladeファイルを呼び出す。
         *returnview-withでarticle_idの情報を渡すブレードファイルはarticle_display.blade。 
        */
        return view('article_display')->with('article', $article);
    }
}

