<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('article');
            $table->string('article_title');
            $table->timestamps();
            /** 
             * 以下articleテーブルから親テーブルの外部キーに接続する。
             * ->default(1);←こいつがある限りidが1のユーザーしか反映されない。
             * ->default();
            */
            $table->integer('user_id')->unsigned()->default();
            $table->foreign('user_id') //外部キー制約
            ->references('id')//userのidカラムを参照する?
            ->on('users')//usersテーブルのidを参照する
            ->onDelete('cascade');//ユーザーが削除されたら紐付くpostsも削除               
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        Schema::dropIfExists('articles');

    }
}
