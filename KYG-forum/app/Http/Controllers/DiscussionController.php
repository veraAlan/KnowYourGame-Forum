<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index()
    {
        return Discussion::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $discussion = Discussion::create($request->all());
        return response()->json($discussion, 201);
    }

    public function show($id)
    {
        return Discussion::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $discussion = Discussion::findOrFail($id);
        $discussion->update($request->all());
        return response()->json($discussion, 200);
    }

    public function destroy($id)
    {
        Discussion::destroy($id);
        return response()->json(null, 204);
    }
}