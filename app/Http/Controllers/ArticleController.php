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
      /**
       * ここに'/'で接続された処理を書くarticleテーブルを呼び出す。
       * 呼び出したarticleテーブルをvotings('/')のビューに表示する。
       */
        /**
         * Aricle::selectでarticleカラム=各ユーザーの投稿内容をget();している。
         * 
         */
        //$articles = Article::all();
        $articles = Article::select('article')->get(); 
        //dd($articles);
        //$articles = $articles->where('article');
        foreach ($articles as  $article){
            $article = $article -> article;
            //$article_user = $article -> user_id;
            //$article_user_id = $article -> user_id;
            //dd($article);
            
        }
        //return;
        //$articles = $articles->article;
        //dd($articles);
        //$articles = $articles->paginate(5);
        /** 
         * 全てのArticleを取得してvoting.blade.php側でarticleカラムを取得するがエラーが吐かれる。
          */
        //$articles = Article::all();
        //$articles->article = $request->article;
       // dd($articles);
        /** 
         * $articlesにはArticleテーブル内のarticleカラム一覧が配列で格納されている。
         * articlesをddするとarticle一覧が表示される。
         * このreturn　viewは'votings.blade.phpなのか'
         */
        $test = [
            'hello'=>'テスト',
        ];
        return view('votings',$test);
        //return view('votings', ['articles' => $articles]);
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
         */  
        $article->user_id = $request->user()->id;
        $article->article = $request->article;
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
}

