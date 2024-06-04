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
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    public function index()
    {
        //$games = DB::table('games')->get();
        // $games = Game::all();
        $games = Game::get();
        return view('test.games.index', ['games' => $games]);
    }

    // Función para mostrar el formulario de creación de un nuevo juego.
    // public function create()
    // {
    //     return view('test.games.create');
    // }
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    public function create()
    {
        return view('test.games.create');
    }

    // Función para mostrar un juego específico
    // static public function show($id)
    // {
    //     return Game::findOrFail($id);
    // }
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    public function show($id)
    {
        $games = Game::findOrFail($id); // Buscar el juego por su ID
        return view('test.games.show', ['games' => $games]); // Pasar el juego a la vista
    }

    static public function findFrom(string $columnName, $value)
    {
        return Game::where($columnName, $value)->get();
    }

    // Función para almacenar un nuevo juego
    // public function store(Request $request)
    // {
    //     // Validar los datos del formulario
    //     $request->validate([
    //         'title' => 'required|string|max:255'
    //     ]);

    //     // Crear un nuevo juego con los datos del formulario
    //     Game::create($request->only('title'));

    //     // Redirigir a la página de juegos con un mensaje de éxito
    //     return redirect('/games')->with('success', 'Game created successfully');
    // }
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required']
        ]);

        // $game = new Game;
        // $game->title = $request->input('title');
        // $game->save();
        // HACE LO MISMO QUE LO COMENTADO PERO CON ELOQUENT
        Game::create($validated);

        session()->flash('status', 'Game Created!');

        return to_route('test.games.index');
    }

    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    public function edit(Game $game)
    {
        return view('test.games.edit', ['game' => $game]);
    }
    // Función para actualizar un juego existente
    // public function update(Request $request, $id)
    // {
    //     // Validar los datos del formulario
    //     $request->validate([
    //         'title' => 'required|string|max:255'
    //     ]);

    //     // Buscar el juego por su ID
    //     $game = Game::findOrFail($id);

    //     // Actualizar los datos del juego con los datos del formulario
    //     $game->update($request->only('title'));

    //     // Redirigir a la página de juegos con un mensaje de éxito
    //     return redirect('/games')->with('success', 'Game updated successfully');
    // }

    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'title' => ['required']
        ]);


        // $game = Game::find($game);
        // ES LO MISMO QUE ESTO Game $game


        // $game->title = $request->input('title');
        // $game->save();
        // HACE LO MISMO QUE LO COMENTADO PERO CON ELOQUENT
        $game->update($validated);

        session()->flash('status', 'Game Update!');

        return to_route('test.games.index');
    }

    // Función para eliminar un juego
    // public function destroy($id)
    // {
    //     // Buscar el juego por su ID
    //     $game = Game::findOrFail($id);

    //     // Eliminar el juego
    //     $game->delete();

    //     // Redirigir a la página de juegos con un mensaje de éxito
    //     return redirect('/games')->with('success', 'Game deleted successfully');
    // }
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    ////GAMES PRUEBA FORMULARIOS
    public function destroy(Game $game)
    {
        $game->delete();

        session()->flash('status', 'Game Deleted!');

        return to_route('test.games.index');
    }
}
