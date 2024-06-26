<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->bigIncrements('publication_id'); // Auto incremento y clave primaria
            $table->unsignedBigInteger('news_id');
            $table->unsignedBigInteger('game_id');
            $table->string('title', 100);
            $table->text('content');
            $table->binary('img');
            $table->timestamps();
            $table->foreign('news_id')->references('news_id')->on('news')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
