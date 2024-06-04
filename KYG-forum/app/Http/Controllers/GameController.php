<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    // static public function index()
    // {
    //     return Game::all();
    // }
    ////GAMES PRUEBA FORMULARIOS
    public function index()
    {
        //$games = DB::table('games')->get();
        $games = Game::all();

        return view('test.games.menu', ['games' => $games]);
    }

    // Función para mostrar el formulario de creación de un nuevo juego.
    public function create()
    {
        return view('test.games.create');
    }

    // Función para mostrar un juego específico
    static public function show($id)
    {
        return Game::findOrFail($id);
    }

    static public function findFrom(string $columnName, $value)
    {
        return Game::where($columnName, $value)->get();
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
