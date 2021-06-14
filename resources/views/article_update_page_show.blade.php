@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="post" action="{{ route('article_update') }}?id={{ $article->id }}">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea class="form-control" rows="200" cols="100" name="article" name="contents" id="message" style="resize:none">
                {{$article->article}}
                </textarea>
            </div>
            <footer class="fixed-bottom">
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i>記事を更新する。
                        </button>
                    </div>
                    @inject('gunle', 'App\developer_functions\Article_functions')
                    <div class="col-sm-6"> 
                        <select name="gunle_num" id="">
                            <option value="0">{{$gunle -> gunle(0)}}</option>
                            <option value="1">{{$gunle -> gunle(1)}}</option>
                            <option value="2">{{$gunle -> gunle(2)}}</option>
                            <option value="3">{{$gunle -> gunle(3)}}</option>
                        </select>
                    </div>
                </div>
            </footer>
        </form>
    </div>
</div>
@endsection

