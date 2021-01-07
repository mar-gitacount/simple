@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                記事一覧
            </div>
    
        </div>
        <!-- 記事一覧 -->
        @if (count($articles)>0)
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
                           @foreach ($articles as $article)
                              <tr>
                                  <!-- ここにurlの投稿一覧を表示する -->
                                  <!-- 以下にaタグをつかってとりあえずarticle_idをddできるようにする。
                                  接続するにはまずコントローラ側で/article/{id}で指定しなければならない。 
                                  'id' => $article->id←これでarticleのidを取得している。
                                  -->
                                  <?php
                                  //以下でarticleの値を格納する。
                                  $articleresult = $article->article;
                                  //削られた文字に足し合わせるためのドット
                                  $string_dot = "..";
                                  //articleの文字列を0～5まで指定して切り取り代入
                                  $string_mb_substr = mb_substr($articleresult,0,10);
                                  $string_mb_substr = $string_mb_substr.$string_dot;
                                  ?>
                                  <td class="table-text">
                                     <div class="table-text">
                                        <a href = "{{ route('article_display', ['id' => $article->id])}}">
                                        　{{$string_mb_substr}}
                                        </a>
                                     </div>
                                  <td class="table-text"><div class="table-text">{{ $article->user_id }}</div></td>
                                  <td class="table-text"><div class="table-text">{{ $article->id }}</div></td>
                            　</tr>
                            @endforeach
                        </tbody>
                    </table>      
                </div>
            </div>
        @endif     
    </div>
    {{-- ページネーション --}}
      
</div>
@endsection