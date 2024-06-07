<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Game;
use App\Models\Portal;


class PublicationController extends Controller
{
    public function index(News $news)
    {
        $publications = Publication::get();
        return view('test.news.publications.index', ['publications' => $publications, 'news' => $news]);
    }

    public function create( News $news)
    {
        $portal = Portal::find($news->news_ids);
        $games = Game::find($portal->portal_id);
        return view('test.news.publications.create', ['portal' => $portal, 'news' => $news, 'games' => $games]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'news_ids' =>['required'],
            'game_id' =>['required'],
            'title' =>['required'],
            'content' =>['required'],
            'date' =>['required']
        ]);
        Publication::create($validated);
        $news = News::find($request->input('news_ids'));
        session()->flash('status', 'Publication Created!');
        return to_route('test.news.index', ['news' => $news]);
    }

    public function show($id)
    {
        $publications = Publication::findOrFail($id);
        return view('test.news.publications.show', ['publications' => $publications]);
    }

    
    static public function findFrom(string $columnName, $value){
        return Publication::where($columnName, $value)->get();
    }

    public function edit(Publication $publication)
    {
        return view('test.news.publications.edit', ['publications' => $publication]);
    }

    public function update(Request $request, Publication $publication)
    {
        $validated = $request->validate([
            'title' => ['required']
        ]);
        $publication->update($validated);
        session()->flash('status', 'Publication Update!');
        return to_route('test.news.index');
    }

    public function destroy(News $news , Publication $publication)
    {
        $publication->delete();
        session()->flash('status', 'Publication Deleted!');
        return to_route('test.news.index' , $news);
    }
}