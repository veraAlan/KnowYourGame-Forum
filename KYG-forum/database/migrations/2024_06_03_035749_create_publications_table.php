<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->bigIncrements('idpublications'); // Auto incremento y clave primaria
            $table->integer('idnews');
            $table->integer('idgame');
            $table->string('title', 100);
            $table->text('content');
            $table->date('date');
            $table->foreign('idnews')->references('idnews')->on('news')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
