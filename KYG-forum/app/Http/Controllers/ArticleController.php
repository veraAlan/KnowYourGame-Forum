<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Helper function to list Articles.
    static public function getAll(){
        return Article::all();
    }

    /**
     * Insert method for Article table
     * 
     * @param Request
     * @param Integer
     */
    public function insert(Request $request, $idwiki){
        $data = [
            'idwiki' => $idwiki,
            'title' => $request->input('title')
        ];

        Article::create($data);

        return redirect('/wiki/' . $idwiki . '/article');
    }
}