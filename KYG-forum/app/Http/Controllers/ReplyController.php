<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;

class ReplyController extends Controller
{


    // Muestra la lista de respuestas.
    public function index()
    {
        $replies = Reply::get();
        return view('test.replies.index', ['replies' => $replies]);
    }


    // Muestra el formulario de creación de respuesta.
    public function create(Reply $replies)
    {
        $discussions = Discussion::all();
        $users = User::get();
        return view('test.replies.create', ['replies' => $replies, 'discussions' => $discussions, 'users' => $users]);
    }


    // Almacena una nueva respuesta.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'iddiscussion' => ['required', 'exists:discussions,iddiscussion'],
            'user_id' => ['required', 'exists:users,id'],
            'date' => ['required'],
            'content' => ['required'],
        ]);
        Reply::create($validated);
        session()->flash('status', '¡Reply creado!');
        return redirect()->route('test.replies.index');
    }


    // Muestra una respuesta específica.
    public function show($id)
    {
        $replies = Reply::findOrFail($id);
        return view('test.replies.show', ['replies' => $replies]);
    }


    // Muestra el formulario de edición de respuesta.
    public function edit(Reply $replies)
    {
        $discussions = Discussion::all();
        $users = User::get();
        return view('test.replies.edit', ['replies' => $replies, 'discussions' => $discussions, 'users' => $users]);
    }


    // Actualiza una respuesta existente.
    public function update(Request $request, Reply $replies)
    {
        $validated = $request->validate([
            'iddiscussion' => ['required', 'exists:discussions,iddiscussion'],
            'user_id' => ['required', 'exists:users,id'],
            'date' => ['required'],
            'content' => ['required'],
        ]);
        $replies->update($validated);
        session()->flash('status', 'Replies actualizado!');
        return redirect()->route('test.replies.index');
    }


    // Elimina una respuesta existente.
    public function destroy(Reply $replies)
    {
        $replies->delete();
        session()->flash('status', 'Replies eliminado!');
        return to_route('test.replies.index');
    }
}
