<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->bigIncrements('idpublication'); // Auto incremento y clave primaria
            $table->integer('idnew');
            $table->integer('idgame');
            $table->string('title', 100);
            $table->text('content');
            $table->date('date');
            $table->timestamps();
            $table->foreign('idnew')->references('idnew')->on('news')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
