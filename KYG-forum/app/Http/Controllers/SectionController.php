<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    static public function findFrom(string $columnName, $value){
        return Section::where($columnName, $value)->get();
    }

    /**
     * Insert method for Section table
     * 
     * @param Request
     * @param Integer
     * @param Integer
     */
    public function insert(Request $request, $idarticle, $idwiki){
        $token = $request->session()->token();
        $token = csrf_token();

        $data = [
            'idarticle' => $request->input('idarticle'),
            'content' => $request->input('content')
        ];

        Section::create($data);

        return redirect('/wiki/' . $idwiki . "/article/" . $idarticle . "/show");
    }
}