<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    // Define the route for storing assets, in this case image directory is needed.
    private $storage_path = 'games/images/';

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
        // Validate necesita todos los valores que van a salir, si en validate('title') no sale, entonces $validated->title no exite.
        $validated = $request->validate([
            'title' => 'required|min:2|max:50',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $validated['img'] = $this->storeImage($request, $validated, $this->storage_path);
        Game::create($validated);
        return redirect()->route('game.index')->with(['status' => 'created']);
        return redirect()->route('game.index')->withErrors($validated);
    }

    /**
     * Update a Games's information.
     * 
     * @param Request
     */
    public function update(Request $request)
    {   
        $validated = $request->validate([
            'game_id' => 'required|exists:games',
            'title' => 'nullable|min:2|max:50',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $game = Game::find($request->input('game_id'));

        // Solo realizar update de imagen si cambia la imagen.
        if(isset($validated['title'])){
            if(isset($validated['img'])){
                // If an image is validated, delete stored image and update a new one.
                $this->deleteImage($game->img);
                $validated['img'] = $this->storeImage($request->img, $validated, $this->storage_path);
            }else{
                // If there is a name change but no image, only update the image name.
                $validated['img'] = $this->updateStoredName($game, $validated, $this->storage_path);
            }
        }
        $game->update($validated);
        return redirect()->route('game.index', '#show-update')->with(['status' => 'updated', 'idupdated' => $request->input('game_id')]);
        return redirect()->route('game.index')->withErrors($validated);
    }

    /**
     * Delete the selected Game.
     * 
     * @param Request
     */
    public function destroy(Request $request){
        $validated = $request->validate([
            'game_id' => 'required|exists:games'
        ]);

        $gameobj = Game::find($request->input('game_id'));
        // First remove the image from storage.
        $this->deleteImage($gameobj->img);
        // Then complete removal from DB.
        $gameobj->delete();

        return redirect()->route('game.index')->with('status', 'deleted');
        return redirect()->route('game.index')->withErrors($validated);
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
