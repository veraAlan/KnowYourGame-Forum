<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    // Función para mostrar todos los juegos
    public function index()
    {
        $games = Game::all();
        return view('test.games.index', ['games' => $games]);
    }

    // Función para mostrar el formulario de creación de un nuevo juego.
    public function create()
    {
        return view('test.games.create');
    }

    // Función para mostrar un juego específico
    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('test.games.show', ['game' => $game]);
    }

    // Función para almacenar un nuevo juego
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        // Crear un nuevo juego con los datos del formulario
        Game::create($request->only('title'));

        // Redirigir a la página de juegos con un mensaje de éxito
        return redirect('/games')->with('success', 'Game created successfully');
    }

    // Función para actualizar un juego existente
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        // Buscar el juego por su ID
        $game = Game::findOrFail($id);

        // Actualizar los datos del juego con los datos del formulario
        $game->update($request->only('title'));

        // Redirigir a la página de juegos con un mensaje de éxito
        return redirect('/games')->with('success', 'Game updated successfully');
    }

    // Función para eliminar un juego
    public function destroy($id)
    {
        // Buscar el juego por su ID
        $game = Game::findOrFail($id);

        // Eliminar el juego
        $game->delete();

        // Redirigir a la página de juegos con un mensaje de éxito
        return redirect('/games')->with('success', 'Game deleted successfully');
    }
}
