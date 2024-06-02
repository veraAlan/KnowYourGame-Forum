<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function index()
    {
        return Reply::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $reply = Reply::create($request->all());
        return response()->json($reply, 201);
    }

    public function show($id)
    {
        return Reply::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $reply = Reply::findOrFail($id);
        $reply->update($request->all());
        return response()->json($reply, 200);
    }

    public function destroy($id)
    {
        Reply::destroy($id);
        return response()->json(null, 204);
    }
}