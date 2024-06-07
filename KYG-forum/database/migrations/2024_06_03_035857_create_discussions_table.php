<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsTable extends Migration
{
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->bigIncrements('discussion_id');
            $table->unsignedBigInteger('forum_id');
            $table->unsignedBigInteger('user_id'); // Cambiado de 'username' a 'user_id'
            $table->date('date');
            $table->string('title', 100);
            $table->text('content');
            $table->timestamps();
            $table->foreign('forum_id')->references('forum_id')->on('forums')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Cambiado de 'username' a 'id'
        });
    }

    public function down()
    {
        Schema::dropIfExists('discussions');
    }
}
