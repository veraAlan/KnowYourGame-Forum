<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('userroles', function (Blueprint $table) {
            // Agregar columna iduserrole
            $table->bigIncrements('iduserrole'); // Esto agrega la columna y la define como clave primaria
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userroles', function (Blueprint $table) {
            // Eliminar la columna iduserrole
            $table->dropColumn('iduserrole');
        });
    }
};
