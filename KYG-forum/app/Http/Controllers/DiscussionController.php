<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Forum;
use App\Models\Game;
use App\Models\Portal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    /**
     * 
     */
    public function show(Discussion $discussion)
    {
        $forum = $discussion->forum;

        return view('portals.forum.discussion', compact('forum', 'discussion'));
    }

    public function index(Discussion $discussion)
    {
        $forum = $discussion->forum;
        $user = $discussion->user;
        $replies = $discussion->replies;
        return view('game.portal.forum.discussion.index', compact('forum', 'discussion', 'user', 'replies'));
    }


    // Muestra el formulario de creación de discusión.
    public function create(Request $request, Game $game, Portal $portal, Forum $forum)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $user_id = Auth::id();
        $request->merge(['user_id' => $user_id]);
        $validated = $request->validate([
            'forum_id' => 'required', 
            'user_id' => 'required', 
            'title' => 'required',
            'content' => 'required'
        ]);
        Discussion::create($validated);
        return redirect()->route('game.portal.forum.index', ['game' => $game, 'portal' => $portal, 'forum' => $forum])->with('status', 'created');
    }
    


    // Almacena una nueva discusión.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'forum_id' => ['required', 'exists:forums,forum_id'],
            'user_id' => ['required', 'exists:users,id'],
            'date' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
        ]);
        Discussion::create($validated);
        session()->flash('status', '¡Discussion creado!');
        return redirect()->route('test.discussions.index');
    }


    // Muestra el formulario de edición de discusión.
    public function edit(Discussion $discussions)
    {
        $forums = Forum::get();
        $users = User::all();
        return view('test.discussions.edit', ['discussions' => $discussions, 'forums' => $forums, 'users' => $users]);
    }


    // Actualiza una discusión existente.
    public function update(Request $request, Discussion $discussions)
    {
        $validated = $request->validate([
            'forum_id' => ['required', 'exists:forums,forum_id'],
            'user_id' => ['required', 'exists:users,id'],
            'date' => ['required'],
            'title' => ['required'],
            'content' => ['required'],
        ]);
        $discussions->update($validated);
        session()->flash('status', 'Discussion actualizado!');
        return redirect()->route('test.discussions.index');
    }


    // Elimina una discusión existente.
    public function destroy(Discussion $discussion){
        $forum = $discussion->forum;
        $discussion->delete();
        return redirect()->route('game.portal.forum.index', $forum->portal_id)->with('status', 'deleted');
    }
}
