<?php

namespace App\Http\Controllers;

use App\Models\Portal;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
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

    public function show($id)
    {
        return Portal::find($id);
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