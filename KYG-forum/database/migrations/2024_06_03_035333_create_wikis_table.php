<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWikisTable extends Migration
{
    public function up()
    {
        Schema::create('wikis', function (Blueprint $table) {
            $table->bigIncrements('idwiki'); // Cambiado a bigIncrements
            $table->unsignedInteger('idportal');
            $table->string('title', 100);
            $table->timestamps();
            $table->foreign('idportal')->references('idportal')->on('portals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wikis');
    }
}
