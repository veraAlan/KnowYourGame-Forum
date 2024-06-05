<?php

namespace App\Http\Controllers;

use App\Models\Portal;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    static public function index()
    {
        return Portal::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $portal = Portal::create($request->all());
        return response()->json($portal, 201);
    }

    static public function show($id)
    {
        return Portal::find($id);
    }

    static public function findFrom(string $columnName, $value){
        return Portal::where($columnName, $value)->get();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $portal = Portal::findOrFail($id);
        $portal->update($request->all());
        return response()->json($portal, 200);
    }

    public function destroy($id)
    {
        Portal::destroy($id);
        return response()->json(null, 204);
    }
}