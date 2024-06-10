<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('news_id');
            $table->unsignedInteger('portal_id'); // Cambiado a unsignedInteger
            $table->string('title', 100);
            $table->timestamps();
            $table->foreign('portal_id')->references('portal_id')->on('portals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
