<!-- 　sectionを使う事によってログインページが明記される。 -->
<!-- imgがあるときhtml内に入れ込む -->
<!-- includeで各ユーザーファイルを取得してみる。 -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $article_title_top = $article -> article; ?>
    <title><?php $article_title_top; ?></title>
    
</head>
<body>
    <!-- ヘッダー部分 -->
    <header>
        @include('layouts.app')
    </header>
    <!-- タイトル -->
    <?php
    //タイトル。
    $article_title = $article -> article;
    //string型に変換。
    $user_id = (string) $articleUser -> id;
    $article_id = (string) $article -> id;
    $article_make_time_create = $article -> created_at;
    //$article_make_time_update = $article -> updated_at;
    $display_file = 'user_view.'.$user_id.".".$article_id;
?>
<article class="article">
    <!-- 記事タイトル-->
    <h1>{{$article_title}}</h1>
    <!-- 記事の本文 -->
    {{-- @include($display_file) --}}
</article>
<div class="user_status">
<div class="article_make_user">このページ作成の作成者:{{$articleUser->name}}</div>
<div>作成{{$article->created_at}}</div>
<div>修正{{$article->updated_at}}</div>
</div>
</body>
</html>