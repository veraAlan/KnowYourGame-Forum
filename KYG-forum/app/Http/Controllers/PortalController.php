<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Game;
use App\Models\News;
use App\Models\Portal;
use App\Models\Wiki;
use Illuminate\Http\Request;
class PortalController extends Controller
{
    public function show(Game $game)
    {
        if(isset(Portal::find($game)[0])){
            $foundPortal = Portal::find($game)[0];
            $wiki = $foundPortal->wiki;
            $forum = $foundPortal->forum;
            $news = $foundPortal->news;
        } else {
            // Redirect in case of error finding the portals for a game.
            return redirect()->route('games')->with('Error', 'Couldnt find portals in this game.');
        }

        return view('portal', compact('game', 'wiki', 'forum', 'news'));
    }

    // Muestra una lista de todos los portales.
    public function index(Game $game)
    {
        $games = Game::find($game->game_id);
        $portal = Portal::where('game_id', $game->game_id)->get()[0];
        $wiki = Wiki::where('portal_id', $portal->portal_id)->get();
        $forum = Forum::where('portal_id', $portal->portal_id)->get();
        $new = News::where('portal_id', $portal->portal_id)->get();


        return view('game.portal.index', compact('games', 'wiki', 'new', 'forum', 'portal'));
    }

    public function create(Request $request, Game $game)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $validated = $request->validate([
            'game_id' => 'required',
            'name' => 'required|min:3| max: 25',
            'description' => 'required|min:3| max: 25',
        ]);
        Portal::create($validated);
        return redirect()->route('game.portal.index', $game->game_id)->with('status', 'created');
    }


    public function update(Request $request, Portal $portal)
    {
        $game = Game::find($portal->game_id);
        $validated = $request->validate([
            'name' => 'required|min:3| max: 25',
            'description' => 'required|min:3| max: 25',
        ]);
        Portal::find($portal->portal_id)->update($validated);
        return redirect()->route('game.portal.index', ['game' => $game, '#show-update'])->with(['status' => 'updated', 'idupdated' => $portal->portal_id]);
    }


    public function destroy(Request $request, Portal $portal){
        $game = Game::find($portal->game_id);
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        Portal::find($portal->portal_id)->delete();
        return redirect()->route('game.portal.index', $game)->with('status', 'deleted');
    }
}
