<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Portal;
use Illuminate\Http\Request;

class PortalController extends Controller
{


    // Muestra una lista de todos los portales.
    public function index(Game $game)
    {
        $games = Game::find($game->game_id);
        $portals = Portal::all();
        return view('game.portal.index', compact('games', 'portals'));
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


    public function update(Request $request, Game $games, Portal $portal)
    {
        $validated = $request->validate([
            'name' => 'required|min:3| max: 25',
            'description' => 'required|min:3| max: 25',
        ]);
        Portal::find($portal->portal_id)->update($validated);
        return redirect()->route('game.portal.index', ['game' => $games, '#show-update'])->with(['status' => 'updated', 'idupdated' => $portal->portal_id]);
    }


    public function destroy(Request $request, Game $games, Portal $portal){
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        Portal::find($portal->portal_id)->delete();
        return redirect()->route('game.portal.index', $games)->with('status', 'deleted');
    }
}
