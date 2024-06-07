<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->bigIncrements('idreply'); // Auto incremento y clave primaria
            $table->unsignedBigInteger('iddiscussion');
            $table->unsignedBigInteger('id_user'); // Cambiado de 'username' a 'user_id'
            $table->date('date');
            $table->text('content');
            $table->timestamps();
            $table->foreign('iddiscussion')->references('iddiscussion')->on('discussions')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade'); // Referencia al campo 'id' en 'users'
        });
    }

    public function down()
    {
        Schema::dropIfExists('replies');
    }
}
