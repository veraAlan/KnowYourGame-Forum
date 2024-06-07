<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserrolesTable extends Migration
{
    public function up()
    {
        Schema::create('userroles', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user');
            $table->bigInteger('idrole')->unsigned(); // Asegurar que sea unsigned
            $table->primary(['id_user', 'idrole']);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idrole')->references('idrole')->on('roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('userroles');
    }
}
