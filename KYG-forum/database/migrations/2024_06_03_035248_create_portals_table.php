<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortalsTable extends Migration
{
    public function up()
    {
        Schema::create('portals', function (Blueprint $table) {
            $table->increments('portal_id');  // Auto increment y clave primaria
            $table->unsignedInteger('game_id');
            $table->string('name', 100);
            $table->string('description', 255);
            $table->timestamps();
            $table->foreign('game_id')->references('game_id')->on('games')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('portals');
    }
}

