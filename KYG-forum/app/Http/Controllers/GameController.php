<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    // Define the route for storing assets, in this case image directory is needed.
    private $storage_path = 'games/images/';

    // Get games.
    public function show()
    {
        $games = Game::all();
        return view('games', compact('games'));
    }

    // Muestra la lista de juegos.
    public function index()
    {
        $games = Game::all();
        return view('game.index', compact('games'));
    }

    // Muestra el formulario para crear un nuevo juego.
    public function create(Request $request)
    {
        if (session()->token() !== $request->input('_token')) {
            return redirect()->route('unauthorized')->with('status', 'Invalid token.');
        }
        $validated = $request->validate([
            'title' => 'required|min:2|max:50',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $validated['img'] = $this->storeImage($validated, $this->storage_path);
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
                $validated['img'] = $this->storeImage($validated, $this->storage_path);
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

    
}
