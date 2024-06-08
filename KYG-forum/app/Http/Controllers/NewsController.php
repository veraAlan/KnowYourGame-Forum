<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Portal;
use App\Models\Publication;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        $portals = Portal::all();
        return view('news.index', compact('news', 'portals'));
    }

    public function create(Request $request)
    {
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'invalid token.');
        }
        $validated = $request->validated([
            'news_id' => 'required|unique:news,idnews',
            'portal_id' => 'required'
        ]);
        News::create($validated);

        return redirect()->route('wiki.index')->with(['status' => 'created']);
    }

    public function edit()
    {
        return view('news.index', ['news' => News::all()]);
    }


    public function update(Request $request)
    {
        News::find($request->input('wiki_id'))->update($request->input());
        return redirect()->route('news.index', '#show-update')->with(['status' => 'update', 'idupdated' => $request->input('news_id')]);
    }

    public function destroy(Request $request)
    {
        News::find($request->input('wiki_id'))->delete();
        return redirect()->route('wiki.index')->with('status', 'deleted');
    }
}