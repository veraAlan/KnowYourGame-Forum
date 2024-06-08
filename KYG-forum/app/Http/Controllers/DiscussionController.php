<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Forum;
use App\Models\Game;
use App\Models\Portal;
use App\Models\User;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{

    public function index(Game $game, Portal $portal, Forum $forum)
    {
        $discussions = Discussion::where('forum_id', $forum->forum_id)->get();
        return view('forum.partials.edit', compact('game', 'portal', 'forum', 'discussions'));
    }


    // Muestra el formulario de creación de discusión.
    public function create(Request $request, Game $game, Portal $portal, Forum $forum)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $validated = $request->validate([
            'forum_id' => 'required', 
            'user_id' => 'required', 
            'date' => 'required',
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


    // Muestra una discusión específica.
    public function show($id)
    {
        $discussions = Discussion::findOrFail($id);
        return view('test.discussions.show', ['discussions' => $discussions]);
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
    public function destroy(Discussion $discussions)
    {
        $discussions->delete();
        session()->flash('status', 'Discussion eliminado!');
        return to_route('test.discussions.index');
    }
}
