<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{


    // Muestra el formulario para crear un nuevo juego.
    public function create(Game $games)
    {
        return view('test.games.create', ['games' => $games]);
    }


    // Muestra la lista de juegos.
    public function index()
    {
        $games = Game::get();
        return view('test.games.index', ['games' => $games]);
    }


    // Muestra los detalles de un juego específico.
    public function show($id)
    {
        $games = Game::findOrFail($id);
        return view('test.games.show', ['games' => $games]);
    }


    // Almacena un nuevo juego creado.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required']
        ]);
        Game::create($validated);
        session()->flash('status', 'Game Created!');
        return to_route('test.games.index');
    }


    // Muestra el formulario para editar un juego existente.
    public function edit(Game $games)
    {
        return view('test.games.edit', ['games' => $games]);
    }


    // Actualiza la información de un juego existente.
    public function update(Request $request, Game $games)
    {
        $validated = $request->validate([
            'title' => ['required']
        ]);
        $games->update($validated);
        session()->flash('status', 'Game Update!');
        return to_route('test.games.index');
    }


    // Elimina un juego existente.
    public function destroy(Game $games)
    {
        $games->delete();
        session()->flash('status', 'Game Deleted!');
        return to_route('test.games.index');
    }
}
