<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Game;
use App\Models\Portal;
use Illuminate\Http\Request;

class ForumController extends Controller
{

    public function index(Game $game, Portal $portal)
    {
        $forums = Forum::where('forum_id', $portal->portal_id)->get();
        return view('game.portal.forum.index', compact('forums', 'portal', 'game'));
    }


    // public function create(Request $request, Game $game, Portal $portal)
    // {
    //     if (session()->token() !== $request->input('_token')) {
    //         return redirect()->route('unauthorized')->with('status', 'Invalid token.');
    //     }
    //     $validated = $request->validate([
    //         'portal_id' => 'required',
    //         'title' => 'required|min:3|max:25'
    //     ]);
    //     Forum::create($validated);
    //     return redirect()->route('game.portal.forum.index', ['game' => $game, 'portal' => $portal])->with('status', 'created');
    // }


    public function update(Request $request, Game $game, Portal $portal, Forum $forum)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Token inválido.');
        }

        $validated = $request->validate([
            'portal_id' => 'required',
            'title' => 'required|min:3|max:25'
        ]);

        $forum->update($validated);

        return redirect()->route('game.portal.forum.index', ['game' => $game, 'portal' => $portal, '#show-update'])
            ->with(['status' => 'actualizado', 'idupdated' => $forum->forum_id]);
    }


    public function destroy(Request $request, Game $game, Portal $portal, Forum $forum)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $forum->delete();
        return redirect()->route('game.portal.forum.index', ['game' => $game, 'portal' => $portal])->with('status', 'deleted');
    }
}
