<!-- 　sectionを使う事によってログインページが明記される。 -->
<!-- imgがあるときhtml内に入れ込む -->

@extends('layouts.app')
@section('content')
{{$article->article}}

<h2>このページを作成したのは{{$articleUser->name}}です。</h2>
@endsection
