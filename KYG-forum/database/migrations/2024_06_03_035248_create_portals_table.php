<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortalsTable extends Migration
{
    public function up()
    {
        Schema::create('portals', function (Blueprint $table) {
            $table->increments('idportal');  // Auto increment y clave primaria
            $table->unsignedInteger('idgame');
            $table->string('name', 100);
            $table->string('description', 255);
            $table->timestamps();
            $table->foreign('idgame')->references('idgame')->on('games')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('portals');
    }
}

