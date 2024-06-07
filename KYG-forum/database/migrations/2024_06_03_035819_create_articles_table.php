<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('article_id'); // Auto incremento y clave primaria
            $table->unsignedBigInteger('wiki_id');
            $table->string('title', 100);
            $table->timestamps();
            $table->foreign('wiki_id')->references('wiki_id')->on('wikis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
