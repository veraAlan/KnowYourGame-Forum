<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsTable extends Migration
{
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->bigIncrements('iddiscussion');
            $table->unsignedBigInteger('idforum');
            $table->unsignedBigInteger('user_id'); // Cambiado de 'username' a 'user_id'
            $table->date('date');
            $table->string('title', 100);
            $table->text('content');
            
            $table->foreign('idforum')->references('idforum')->on('forums')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Cambiado de 'username' a 'id'
        });
    }

    public function down()
    {
        Schema::dropIfExists('discussions');
    }
}
