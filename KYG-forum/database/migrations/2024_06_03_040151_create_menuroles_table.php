<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenurolesTable extends Migration
{
    public function up()
    {
        Schema::create('menuroles', function (Blueprint $table) {
            $table->bigInteger('role_id')->unsigned(); // Cambiado a bigInteger
            $table->bigInteger('menu_id')->unsigned(); // Cambiado a bigInteger
            $table->primary(['role_id', 'menu_id']);
            $table->timestamps();
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
            $table->foreign('menu_id')->references('menu_id')->on('menus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menuroles');
    }
}
