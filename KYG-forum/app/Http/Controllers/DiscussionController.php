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
        $discussion = Discussion::where('forum_id', $forum->forum_id)->get();
        return view('game.portal.forum.discussion.index', compact('game', 'portal', 'forum', 'discussion'));
    }
    // Muestra la lista de discusiones.
    // public function index()
    // {
    //     $discussions = Discussion::get();
    //     return view('test.discussions.index', ['discussions' => $discussions]);
    // }


    // Muestra el formulario de creación de discusión.
    public function create(Discussion $discussions)
    {
        $forums = Forum::get();
        $users = User::all();
        return view('test.discussions.create', ['discussions' => $discussions, 'forums' => $forums, 'users' => $users]);
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
