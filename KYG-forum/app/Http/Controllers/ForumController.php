<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        return Forum::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $forum = Forum::create($request->all());
        return response()->json($forum, 201);
    }

    static public function show($id)
    {
        return Forum::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $forum = Forum::findOrFail($id);
        $forum->update($request->all());
        return response()->json($forum, 200);
    }

    public function destroy($id)
    {
        Forum::destroy($id);
        return response()->json(null, 204);
    }
}