@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" class="col-sm-offset-2 col-sm-8">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">{{ Auth::user()->name }}</div>
                <div class="card-body">{{ Auth::user()->email }}</div>
                <div class="card-body">{{ Auth::user()->id }}</div>
                <!-- ここにユーザーの記事一覧を表示する。 -->
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('Author') }}</th>
                        <th>{{ __('article') }}</th>
                    </tr>
                    <!-- ログイン中のユーザー=user その中のarticles -->
                    @foreach($user -> articles as $article)
                        <tr>
                            <td>
                                <!-- usernameを出力する -->
                                {{$user->name}}
                            </td>
                            <td>
                                <!-- articleテーブルのarticleを表示する -->
                               
                                {{$article->article}}
                            </td>
                        </tr>
                    @endforeach
                </thead>
                </table>

                <form action="/">
                    <button type="submit" class="btn btn-light">みんなの記事一覧へ</button>
                </form>
                <a href="/article"><button type="submit" class="btn btn-light">記事作成ページへ移動する。</button></a>

                <!-- ユーザー情報を削除ボタン押したらtopに戻る。補足:できればパスワードを要求するusercontrolerを使うか?homeからできるならやる -->
                <!-- 削除ボタンを作る -->
                <!-- actionでurl指定している。ユーザーのidを表示できる-->
                <!-- ボタンを押すと画面が遷移できるので処理はrouteは呼べているが、削除ができない。 -->
                <!-- ここのuseridはコントローラのuseridを示している -->
                <form action="{{ route('user_delete')}}" method="post" id="user_delete_form">
                    @method('DELETE')
                    @csrf                
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Okボタンを押すとすべてのユーザー情報を削除してしまい、復活もできません。よろしいですか？')">
                    <i class="fa fa-trash">{{ __('ユーザー情報を削除する。') }}</i>       
                    </button>
                </form>
                <!--  -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('ログインされています。') }}
                </div>
            </div>
        </div>
        <div>{{$user->articles->links()}}</div>
    </div>
  
</div>
@endsection
