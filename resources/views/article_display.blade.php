<!-- 　sectionを使う事によってログインページが明記される。 -->
<!-- imgがあるときhtml内に入れ込む -->

@extends('layouts.app')
@section('content')
{{$article->article}}
<h2>このページを作成したのは{{$article->user_id}}です。</h2>
@endsection