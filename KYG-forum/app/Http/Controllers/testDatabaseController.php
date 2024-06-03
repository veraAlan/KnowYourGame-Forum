<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Schema;

class testDatabaseController extends Controller
{
    static public function showDatabaseTables()
    {
        // $tables = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        // return view('tables', compact('tables'));
        $array = [];
        $tables = DB::select('SHOW TABLES');
        
        foreach ($tables as $table) {
            foreach ($table as $key => $value) {
                $tableName = $value;
                // This data ends up being a "Illuminate\Support\Collection Object" in the view, check out. its 'table[1]' in tables.blade.php
                $data = DB::table($tableName)->get();
                array_push($array, [$tableName, $data]);
            }
        }
        return ['tables' => $array];
    }
}