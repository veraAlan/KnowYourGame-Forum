<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('idsection'); // Auto incremento y clave primaria
            $table->unsignedBigInteger('idarticle'); // Cambiado a unsignedBigInteger
            $table->text('content');
            $table->foreign('idarticle')->references('idarticle')->on('articles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
