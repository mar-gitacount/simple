@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                新しい記事
            </div>

            <div class="panel-body">
                @include('common.errors')
                <!-- 新しい投稿を作る -->
                <form action="/voting" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <!-- 記事の名前 -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">記事</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="voting-name" class="form-control" value="{{ old('voting') }}">
                        </div>
                    </div>
                    <!-- add voting -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i>記事を追加する
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- 記事一覧 -->
        @if (count($votings)>0)
           <div class="panel-body">
               <div class="panel-heading">
                記事一覧
               </div>

               <div class="panel-body">
                   <table class="table table-striped task-table">
                       <thead>
                           <th>記事</th>
                           <th>&nbsp;</th>
                        </thead>
                       <tbody>
                           <!-- ここの$votingsはルーティングの$votings?? -->
                           @foreach ($votings as $voting)
                              <tr>
                                  <td class="table-text"><div class="table-text">{{ $voting->name }}</div></td>
                            <!-- 記事削除 -->
                                   <td>
                                       
                                       <form action="/voting/{{ $voting->id}}" method="POST">
                                           {{ csrf_field() }}
                                           {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>削除
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection