<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Forum;
use App\Models\Game;
use App\Models\Portal;
use Illuminate\Http\Request;

class ForumController extends Controller
{

    public function index(Portal $portal)
    {
        $forum = Forum::find($portal->portal_id);
        $discussions = Discussion::where('forum_id', $forum->forum_id)->get();
        return view('game.portal.forum.index', compact('forum', 'discussions', 'portal'));
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
