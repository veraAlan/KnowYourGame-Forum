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
            $table->bigInteger('menuid')->unsigned(); // Cambiado a bigInteger
            $table->primary(['idrole', 'menuid']);
            $table->foreign('idrole')->references('idrole')->on('roles')->onDelete('cascade');
            $table->foreign('menuid')->references('menuid')->on('menus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menuroles');
    }
}
