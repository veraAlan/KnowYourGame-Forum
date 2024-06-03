<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return News::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $news = News::create($request->all());
        return response()->json($news, 201);
    }

    static public function show($id)
    {
        return News::find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $news->update($request->all());
        return response()->json($news, 200);
    }

    public function destroy($id)
    {
        News::destroy($id);
        return response()->json(null, 204);
    }
}