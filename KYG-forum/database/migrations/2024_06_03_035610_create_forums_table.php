<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->bigIncrements('idforum');
            $table->unsignedInteger('idportal'); // Cambiado a unsignedInteger
            $table->string('title', 100);
            $table->string('img', 255);
            $table->timestamps();
            $table->foreign('idportal')->references('idportal')->on('portals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('forums');
    }
}
