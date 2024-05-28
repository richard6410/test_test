<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculums', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //カリキュラムタイトル
            $table->string('thumbnail'); //カリキュラムサムネイル
            $table->longText('description'); //カリキュラム説明文
            $table->mediumText('video_url'); //動画URL
            $table->tinyInteger('alway_delivery_flg'); //常時公開フラグ
            $table->integer('classes_id'); //クラスID
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculums');
    }
};
