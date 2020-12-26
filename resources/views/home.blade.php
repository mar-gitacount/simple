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

                <form action="/">
                    <button type="submit" class="btn btn-light">記事一覧へ</button>
                </form>
                <form action="{{route('article')}}">
                <button type="submit" class="btn btn-light">記事作成ページへ</button>
                </form>

                <!-- ユーザー情報を削除ボタン押したらtopに戻る。補足:できればパスワードを要求するusercontrolerを使うか?homeからできるならやる -->
                <!-- 削除ボタンを作る -->
                <!-- actionでurl指定している。ユーザーのidを表示できる-->
                <!-- ボタンを押すと画面が遷移できるので処理はrouteは呼べているが、削除ができない。 -->
                <!-- ここのuseridはコントローラのuseridを示している -->
                <form action="{{ route('user_delete')}}" method="post">
                @method('DELETE')
                @csrf
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                    {{ __('削除') }}
                    </button>
                </form>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}　
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
