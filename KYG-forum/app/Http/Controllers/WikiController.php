<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Portal;
use App\Models\Wiki;
use Illuminate\Http\Request;


class WikiController extends Controller
{
    /**
     * User view of Wiki.
     */
    public function show(Wiki $wiki)
    {
        $portal = $wiki->portal;
        return view('portals.wiki.index', compact('portal', 'wiki'));
    }

    /**
     * Show basic index with all wikis.
     */
    public function index()
    {
        $wikis = Wiki::all();
        $portals = Portal::all();
        return view('wiki.index', compact('wikis', 'portals'));
    }

    /**
     * Insert method for Wiki table
     * 
     * @param Request
     */
    public function create(Request $request){
        if(session()->token() !== $request->input('_token')){
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $portal = Portal::find($request->input('portal_id'));
        $game = Game::find($portal->game_id);
        $validated = $request->validate([
            'title' => 'required|min:3|unique:wikis,title',
            'portal_id' => 'required'
        ]);

        Wiki::create($validated);

        return redirect()->route('game.portal.index', $game->game_id)->with(['status' => 'created']);
    }

    /**
     * Edit method for Wiki table
     */
    public function edit()
    {
        return view('wiki.index', ['wikis'=> Wiki::all()]);
    }

    /**
     * Update a Wiki's information.
     * 
     * @param Request
     */
    public function update(Request $request, Wiki $wiki)
    {

        Wiki::find($wiki->wiki_id)->update($request->input());

        return redirect()->route('game.portal.index', [$wiki->portal->game, '#show-update'])->with(['status' => 'updated', 'idupdated' => $request->input('wiki_id')]);
    }

    /**
     * Delete the selected Wiki.
     * 
     * @param Request
     */
    public function destroy(Wiki $wiki){
        
        $wiki->delete();
        return redirect()->route('game.portal.index', [$wiki->portal->game, '#show-update'])->with('status', 'deleted');
    }
}
