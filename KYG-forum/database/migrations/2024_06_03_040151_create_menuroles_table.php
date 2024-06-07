<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenurolesTable extends Migration
{
    public function up()
    {
        Schema::create('menuroles', function (Blueprint $table) {
            $table->bigInteger('idrole')->unsigned(); // Cambiado a bigInteger
            $table->bigInteger('idmenu')->unsigned(); // Cambiado a bigInteger
            $table->primary(['idrole', 'idmenu']);
            $table->timestamps();
            $table->foreign('idrole')->references('idrole')->on('roles')->onDelete('cascade');
            $table->foreign('idmenu')->references('idmenu')->on('menus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menuroles');
    }
}
