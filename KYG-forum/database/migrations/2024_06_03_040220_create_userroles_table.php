<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserrolesTable extends Migration
{
    public function up()
    {
        Schema::create('userroles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('role_id')->unsigned(); // Asegurar que sea unsigned
            $table->primary('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('userroles');
    }
}
