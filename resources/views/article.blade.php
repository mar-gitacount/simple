@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
        <div class="panel-body">
                @include('common.errors')
                <form action="/article" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">記事を以下に書く</label>
                        <div class="col-sm-6">
                            <textarea rows="100" cols="100" name="contents" class= "form-control" id="message" style="resize:none"></textarea> 
                        </div>
                </div>
                </form>
        </div>
    </div>
</div>
@endsection