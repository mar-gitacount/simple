@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-body">
                @include('common.errors')
                <form action="post">
                    @csrf
                    <label for="task-name" class="col-sm-3 control-label">記事を以下に書く</label>
                    <input type="file" accept=".jpg,.jpeg,.png,.gif" value="初期値"  id="file" name ="file" class="form-control">
                    <button type="submit">アップロード</button>
                </form>
                <form action = "{{ route('articlepost')}}"  method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">                   
                        <!-- タイトル、本文 -->
                        <div class="form-group">
                            <div class="col-sm-6"> 
                                {{--  <textarea rows="200" cols="100" name="article" name="contents" class= "form-control" id="message" style="resize:none"></textarea>  --}}
                                <textarea class="form-control" rows="5" cols="100" name="article" name="contents" id="message" style="resize:none"></textarea>
                                <textarea class="form-control"  rows="10" cols="30" name="article_text" name="contents" id="text" ></textarea>                         
                            </div>
                            {{-- @inject('gunle_first', 'App\developer_functions\Article_functions') --}}
                            {{-- <div class="col-sm-6"> 
                                <select name="gunle_num" id="">
                                    <option value="0">{{$gunle_first ->  gunle_first(0)}}</option>
                                    <option value="1">{{$gunle_first ->  gunle_first(1)}}</option>
                                    <option value="2">{{$gunle_first ->  gunle_first(2)}}</option>
                                    <option value="3">{{$gunle_first ->  gunle_first(3)}}</option>
                                </select>
                            </div> --}}
                            <div class="col-sm-6">
                                @inject('gunle', 'App\developer_functions\Article_functions')
                                <?php
                                    $gunle = $gunle -> gunle();
                                ?>
                                <select name="gunle_num" id="" >
                                    <?php foreach ($gunle as $index => $item):?>
                                    <?php
                                    echo "<option value = \"{$index}\" >{$item}</option>"
                                    ?>
                                    <?php endforeach;?>
                                </select>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        window.addEventListener('load',function(){
            /** 
             *pictureボタンを押下した時にイベント発生する。
             * 画像ファイルを開かせる。 
            */
            document.getElementById("file").addEventListener('click',logPosition);
        });


        function logPosition(event){         
            alert("helo");
            var textarea = document.getElementById('message');
            //textareaでカーソルの位置を取得している。
            var textarea = textarea.selectionStart;
            //以下でファイル取得されたときの処理。idはfile
            $("#file").on("change",function(){
                //ファイルオブジェクトを格納している。
                //ファイル選択後に以下の処理が走る。
                //とりあえずカーソルの場所に「テスト」という文字列をいれられるかチェック。textarea.inner.textで入れてみる。
                alert('here');
                const files = $("#file")[0].files;
                const file = files[0];
                const filename = file.name;
                console.log(`選択された:${filename}`);
                alert(textarea);
                /** 
                *inner.htmlでimageタグをいれるfilenameもリネームする。
                *  
                */
            });
            //alert(textarea.selectionEnd);
           //alert("screenX:" + event.screenX);
           //alert("screenY" + event.screenY);
        }
    </script>
</div>

@endsection