@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-body">
                @include('common.errors')
                <form action="{{ route('articlepost')}}"  method="POST" class="form-horizontal">
                   {{ csrf_field() }}
                   <div class="form-group">
                       <label for="task-name" class="col-sm-3 control-label">記事を以下に書く</label>
                　　   <!-- タイトル、本文 -->
                　　    <div class="form-group">
                           <div class="col-sm-6">
                              <textarea rows="10" cols="100" name="article" name="contents" class= "form-control" id="message" style="resize:none"></textarea> 
                           </div>
                　　     </div>
                         <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i>記事を追加する
                                </button>
                            </div>
                         </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ここからユーザー自身が書いたarticleを表示する。 -->
    <!-- ifのカウントで記事が0以上あれば表示する。ただ、どうやってユーザーと紐づけるか、-->
    <!--   <div class="card-body">{{ Auth::user()->email }}</div>で表示したところ、表示されたのでユーザーと紐づいている。 -->
</div>
@endsection