<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Forum;
use App\Models\Game;
use App\Models\Portal;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function show(Forum $forum)
    {
        $portal = $forum->portal;
        return view('portals.forum.index', compact('portal', 'forum'));
    }

    public function index(Portal $portal)
    {
        $forum = $portal->forum;
        $discussions = Discussion::where('forum_id', $forum->forum_id)->get();
        return view('game.portal.forum.index', compact('forum', 'discussions', 'portal'));
    }

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

        Forum::create($validated);

        return redirect()->route('game.portal.index', $game->game_id)->with(['status' => 'created']);
    }

    public function update(Request $request, Portal $portal, Forum $forum)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Token inválido.');
        }

        $validated = $request->validate([
            'portal_id' => 'required',
            'title' => 'required|min:3|max:25'
        ]);

        $forum->update($validated);

        return redirect()->route('game.portal.forum.index', ['portal' => $portal, '#show-update'])
            ->with(['status' => 'actualizado', 'idupdated' => $forum->forum_id]);
    }


    public function destroy(Request $request, Portal $portal, Forum $forum)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $forum->delete();
        return redirect()->route('game.portal.forum.index', ['portal' => $portal])->with('status', 'deleted');
    }
}
