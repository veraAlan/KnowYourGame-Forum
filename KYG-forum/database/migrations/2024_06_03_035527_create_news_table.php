<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->integer('idnew')->primary();
            $table->unsignedInteger('idportal'); // Cambiado a unsignedInteger
            $table->timestamps();
            $table->foreign('idportal')->references('idportal')->on('portals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
