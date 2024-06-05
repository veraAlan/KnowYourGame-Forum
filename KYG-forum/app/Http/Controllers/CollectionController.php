<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Game;

class CollectionController extends Controller
{


    // Muestra el formulario para crear una nueva colección, incluyendo la lista de juegos disponibles.
    public function create(Collection $collections)
    {
        $games = Game::all();
        return view('test.collections.create', ['collections' => $collections, 'games' => $games]);
    }


    // Muestra la lista de colecciones, incluyendo la lista de todos los juegos.
    public function index()
    {
        $games = Game::all();
        $collections = Collection::get();
        return view('test.collections.index', ['collections' => $collections, 'games' => $games]);
    }


    // Muestra los detalles de una colección específica.
    public function show($id)
    {
        $collections = Collection::findOrFail($id);
        return view('test.collections.show', ['collections' => $collections]);
    }


    // Almacena una nueva colección creada, verificando la existencia del juego asociado.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idgame' => ['required', 'exists:games,idgame'],
            'category' => ['required']
        ]);
        Collection::create($validated);
        session()->flash('status', 'Collection Created!');
        return redirect()->route('test.collections.index');
    }


    // Muestra el formulario para editar una colección existente, incluyendo la lista de juegos disponibles.
    public function edit(Collection $collections)
    {
        $games = Game::all();
        return view('test.collections.edit', ['collections' => $collections, 'games' => $games]);
    }


    // Actualiza la información de una colección existente.
    public function update(Request $request, Collection $collections)
    {
        $validated = $request->validate([
            'idgame' => 'required',
            'category' => 'required',
        ]);
        $collections->update($validated);
        session()->flash('status', 'Collections Update!');
        return redirect()->route('test.collections.index');
    }


    // Elimina una colección existente.
    public function destroy(Collection $collections)
    {
        $collections->delete();
        session()->flash('status', 'Game Deleted!');
        return to_route('test.collections.index');
    }
}
