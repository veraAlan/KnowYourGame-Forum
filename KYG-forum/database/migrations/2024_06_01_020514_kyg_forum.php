<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sql = file_get_contents('E:\Coding\Workspaces\Visual Studio\Github\KnowYourGame-Forum\KYG-forum\database\kyg_forum.sql');
        DB::unprepared($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropDatabaseIfExists('kyg_forum');
    }
};
