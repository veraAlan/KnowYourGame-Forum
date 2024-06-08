<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{


    // Muestra la lista de juegos.
    public function index()
    {
        $games = Game::all();
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
        $img = Storage::url(public_path(Game::find($request->input('game_id'))->img));
        dd($img);
        exit();
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $imageName);
        $validated['img'] = 'images/' . $imageName;
        Game::find($request->input('game_id'))->update($request->input());
        return redirect()->route('wiki.index', '#show-update')->with(['status' => 'updated', 'idupdated' => $request->input('game_id')]);
    }


    public function destroy(Request $request)
    {
        Game::find($request->input('game_id'))->delete();
        return redirect()->route('game.index')->with('status', 'deleted');
    }
}
