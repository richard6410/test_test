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
        Schema::create('itirans', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('syouhinmei');
            $table->integer('kakaku');
            $table->integer('zaikosuu');
            $table->integer('maker');
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
        Schema::dropIfExists('itirans');
    }
};
