<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\delete;

class GameController extends Controller
{


    // Muestra la lista de juegos.
    public function index()
    {
        $games = Game::get();
        return view('game.index', ['games' => $games]);
    }


    // Muestra el formulario para crear un nuevo juego.
    public function create(Request $request)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $validated = $request->validate([
            'title' => 'required|min:3|unique:games,title|max:20',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);
        $validated['img'] = 'images/' . $imageName;
        Game::create($validated);

        return redirect()->route('game.index')->with(['status' => 'created']);
    }

    public function update(Request $request)
    {
        // dd($request->input());
        // exit();
        // dd($request->game_id);
        // exit();

        $img = Storage::url(public_path(Game::find($request->input('game_id'))->img));
        dd($img);
        exit();

        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);
        $validated['img'] = 'images/' . $imageName;


        Game::find($request->input('game_id'))->update($request->input());
        return redirect()->route('wiki.index', '#show-update')->with(['status' => 'updated', 'idupdated' => $request->input('game_id')]);
    }
    // Muestra los detalles de un juego específico.
    // public function show($id)
    // {
    //     $games = Game::findOrFail($id);
    //     return view('test.games.show', ['games' => $games]);
    // }


    // // Almacena un nuevo juego creado.
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'title' => ['required']
    //     ]);
    //     Game::create($validated);
    //     session()->flash('status', 'Game Created!');
    //     return to_route('test.games.index');
    // }


    // // Muestra el formulario para editar un juego existente.
    // public function edit(Game $games)
    // {
    //     return view('test.games.edit', ['games' => $games]);
    // }


    // // Actualiza la información de un juego existente.
    // public function update(Request $request, Game $games)
    // {
    //     $validated = $request->validate([
    //         'title' => ['required']
    //     ]);
    //     $games->update($validated);
    //     session()->flash('status', 'Game Update!');
    //     return to_route('test.games.index');
    // }


    // // Elimina un juego existente.
    // public function destroy(Game $games)
    // {
    //     $games->delete();
    //     session()->flash('status', 'Game Deleted!');
    //     return to_route('test.games.index');
    // }
}
