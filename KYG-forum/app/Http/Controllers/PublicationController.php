<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        return Publication::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $publication = Publication::create($request->all());
        return response()->json($publication, 201);
    }

    public function show($id)
    {
        return Publication::find($id);
    }

    
    static public function findFrom(string $columnName, $value){
        return Publication::where($columnName, $value)->get();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $publication = Publication::findOrFail($id);
        $publication->update($request->all());
        return response()->json($publication, 200);
    }

    public function destroy($id)
    {
        Publication::destroy($id);
        return response()->json(null, 204);
    }
}