<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWikisTable extends Migration
{
    public function up()
    {
        Schema::create('wikis', function (Blueprint $table) {
            $table->bigIncrements('wiki_id'); // Cambiado a bigIncrements
            $table->unsignedInteger('portal_id');
            $table->string('title', 100);
            $table->timestamps();
            $table->foreign('portal_id')->references('portal_id')->on('portals')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wikis');
    }
}
