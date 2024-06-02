<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        return Section::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $section = Section::create($request->all());
        return response()->json($section, 201);
    }

    public function show($id)
    {
        return Section::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $section = Section::findOrFail($id);
        $section->update($request->all());
        return response()->json($section, 200);
    }

    public function destroy($id)
    {
        Section::destroy($id);
        return response()->json(null, 204);
    }
}