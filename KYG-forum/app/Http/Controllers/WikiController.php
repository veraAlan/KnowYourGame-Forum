<?php

namespace App\Http\Controllers;

use App\Models\Wiki;
use Illuminate\Http\Request;

class WikiController extends Controller
{
    public function index()
    {
        return Wiki::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $wiki = Wiki::create($request->all());
        return response()->json($wiki, 201);
    }

    public function show($id)
    {
        return Wiki::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $wiki = Wiki::findOrFail($id);
        $wiki->update($request->all());
        return response()->json($wiki, 200);
    }

    public function destroy($id)
    {
        Wiki::destroy($id);
        return response()->json(null, 204);
    }
}