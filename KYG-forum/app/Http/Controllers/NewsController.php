<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\News;
use App\Models\Portal;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function show(News $news)
    {
        $portal = $news->portal;
        return view('portals.news.index', compact('portal', 'news'));
    }

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
        $portal = Portal::find($request->input('portal_id'));
        $game = Game::find($portal->game_id);
        $validated = $request->validate([
            'title' => 'required',
            'portal_id' => 'required'
        ]);

        News::create($validated);

        return redirect()->route('game.portal.index', $game->game_id)->with(['status' => 'created']);
    }

    public function edit()
    {
        return view('news.index', ['news' => News::all()]);
    }


    public function update(Request $request, News $new)
    {

        News::find($new->news_id)->update($request->input());
        return redirect()->route('game.portal.index', [$new->portal->game, '#show-update'])->with(['status' => 'update', 'idupdated' => $request->input('news_id')]);
    }

    public function destroy(News $new)
    {
        $new->delete();
        return redirect()->route('game.portal.index', [$new->portal->game, '#show-update'])->with('status', 'deleted');
    }
}