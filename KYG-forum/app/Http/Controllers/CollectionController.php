<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Game;

class CollectionController extends Controller
{
    // Muestra el formulario para crear una nueva colección, incluyendo la lista de juegos disponibles.
    public function create(Tag $tags)
    {
        $games = Game::all();
        return view('test.tags.create', ['tags' => $tags, 'games' => $games]);
    }


    // Muestra la lista de colecciones, incluyendo la lista de todos los juegos.
    public function index()
    {
        $games = Game::all();
        $tags = Tag::get();
        return view('test.tags.index', ['tags' => $tags, 'games' => $games]);
    }


    // Muestra los detalles de una colección específica.
    public function show($id)
    {
        $tags = Tag::findOrFail($id);
        return view('test.tags.show', ['tags' => $tags]);
    }


    // Almacena una nueva colección creada, verificando la existencia del juego asociado.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_id' => ['required', 'exists:games,game_id'],
            'category' => ['required']
        ]);
        Tag::create($validated);
        session()->flash('status', 'Tag Created!');
        return redirect()->route('test.tags.index');
    }


    // Muestra el formulario para editar una colección existente, incluyendo la lista de juegos disponibles.
    public function edit(Tag $tags)
    {
        $games = Game::all();
        return view('test.tags.edit', ['tags' => $tags, 'games' => $games]);
    }


    // Actualiza la información de una colección existente.
    public function update(Request $request, Tag $tags)
    {
        $validated = $request->validate([
            'game_id' => 'required',
            'category' => 'required',
        ]);
        $tags->update($validated);
        session()->flash('status', 'Collections Update!');
        return redirect()->route('test.tags.index');
    }


    // Elimina una colección existente.
    public function destroy(Tag $tags)
    {
        $tags->delete();
        session()->flash('status', 'Game Deleted!');
        return to_route('test.tags.index');
    }
}
