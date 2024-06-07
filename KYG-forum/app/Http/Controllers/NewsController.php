<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Publication;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(News $news)
    {
        //$games = DB::table('games')->get();
        // $games = Game::all();
        
        $publications = Publication::where('news_id', $news->news_id)->get();
        return view('test.news.index', ['news' => $news, 'publications' => $publications]);
    }

    public function create()
    {
        return view('test.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required']
        ]);

        // $game = new Game;
        // $game->title = $request->input('title');
        // $game->save();
        // HACE LO MISMO QUE LO COMENTADO PERO CON ELOQUENT
        News::create($validated);

        session()->flash('status', 'News Created!');

        return to_route('test.News.index');
    }
    
    public function show($id)
    {
        $publications = Publication::findOrFail($id);
        return view('test.news.publications.show', ['publications' => $publications]);
    }

    public function edit(News $news)
    {
        return view('test.news.edit', ['news' => $news]);
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => ['required']
        ]);

        $news->update($validated);

        session()->flash('status', 'New Update!');

        return to_route('test.news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();

        session()->flash('status', 'New Deleted!');

        return to_route('test.news.index');
    }
}