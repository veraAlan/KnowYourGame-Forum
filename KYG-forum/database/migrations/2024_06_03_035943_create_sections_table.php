<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('section_id'); // Auto incremento y clave primaria
            $table->unsignedBigInteger('article_id'); // Cambiado a unsignedBigInteger
            $table->string('title', length: 60);
            $table->text('content');
            $table->timestamps();
            $table->binary('img')->nullable();
            $table->foreign('article_id')->references('article_id')->on('articles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
