<?php

namespace App\Http\Controllers;

use App\Models\Wiki;
use Illuminate\Http\Request;

class WikiController extends Controller
{
    public function index()
    {
        $wiki = Wiki::get();
        return view('test.wiki.index', ['wiki' => $wiki]);
    }

    // Helper function
    static public function findFrom(string $columnName, $value){
        return Wiki::where($columnName, $value)->get();
    }

    // Helper function
    static public function getAll(){
        return Wiki::all();
    }

    /**
     * Insert method for Wiki table
     * 
     * @param Request
     */
    public function insert(Request $request){
        // Useful for session authentication.
        $token = $request->session()->token();
        $token = csrf_token();

        $data = [
            'idportal' => $request->input('idportal'),
            'title' => $request->input('title')
        ];

        Wiki::create($data);

        return redirect('/wiki/list');
    }

    /**
     * Edit method for Wiki table
     * 
     * @param Request
     */
    public function edit(Request $request){
        $wiki = Wiki::find($request->input('idwiki'));

        $data = [
            'idportal' => $request->input('idportal'),
            'title' => $request->input('title')
        ];

        $wiki->update($data);

        return redirect('/wiki/list');
    }
}