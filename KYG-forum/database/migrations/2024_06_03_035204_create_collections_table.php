<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    public function up()
    {
        // Crear la tabla collections
        Schema::create('collections', function (Blueprint $table) {
            $table->bigIncrements('idcollection');
            $table->unsignedInteger('idgame'); // Cambiado a unsignedInteger
            $table->string('category', 100);
            $table->foreign('idgame')->references('idgame')->on('games')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
