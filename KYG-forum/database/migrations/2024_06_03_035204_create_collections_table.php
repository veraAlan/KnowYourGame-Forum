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
            $table->bigIncrements('collection_id');
            $table->unsignedInteger('game_id'); // Cambiado a unsignedInteger
            $table->string('category', 100);
            $table->timestamps();
            $table->foreign('game_id')->references('game_id')->on('games')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('collections');
    }
}
