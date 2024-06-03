<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('idarticle'); // Auto incremento y clave primaria
            $table->unsignedBigInteger('idwiki');
            $table->string('title', 100);
            $table->foreign('idwiki')->references('idwiki')->on('wikis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
