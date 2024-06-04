<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testDatabaseController;

use App\Http\Controllers\GameController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\UsersDbController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MenuRoleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserRoleController;
use App\Models\Discussion;
use App\Models\Portal;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/games', [GameController::class, 'index'])->name('games.index');
// Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
// Route::post('/games', [GameController::class, 'store'])->name('games.store');
// Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
// Route::get('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
// Route::put('/games/{id}', [GameController::class, 'update'])->name('games.update');
// Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');
// Route::view('/test_methods', 'test.test_methods')->name('test_methods');

// TODO Refactor
Route::get('/database/tables', function () {
    testDatabaseController::showDatabaseTables();
});

Route::get('/portal/{idgame}', function ($idgame) {
    $portal = PortalController::findFrom('idgame', $idgame);
    $game = GameController::show($idgame);
    $options = ['wiki' => WikiController::show($idgame), 'forum' => ForumController::show($idgame), 'news' => NewsController::show($idgame)];
    return view('test.portal', ['portal' => $portal, 'game' => $game, 'options' => $options]);
});

Route::get('/news/{idportal}', function ($idportal) {
    $game = GameController::show($idportal);
    $news = PublicationController::findFrom('idgame', $idportal);
    return view('news', ['game' => $game, 'news' => $news]);
});

Route::get('/wiki/{idportal}', function ($idportal) {
    $game = GameController::show($idportal);
    $wiki = WikiController::show($idportal);
    $articles = ArticleController::findFrom('idwiki', $wiki->idwiki);
    return view('wiki', ['game' => $game, 'wiki' => $wiki, 'articles' => $articles]);
});

Route::get('/forum/{forum}', function ($idforum) {
    $forum = ForumController::show($idforum);
    $portal = PortalController::show($forum->idportal);
    $game = GameController::show($portal->idgame);
    $discussions = DiscussionController::findFrom('idforum', $idforum);
    return view('forum', ['game' => $game, 'discussions' => $discussions]);
});

Route::get('/games', function () {
    return view('games', ['games' => GameController::index()]);
});
// TODO Refactor up till here. ^^^




//GAMES PRUEBA FORMULARIOS
//Route::view('test/games', 'test.games.menu', ['games' => $games]);
// Route::get('test/games', function () {
//     // $games = [
//     //     [
//     //         'idgame' => 4,
//     //         'title' => 'Dota'
//     //     ],
//     //     [
//     //         'idgame' => 5,
//     //         'title' => 'Smite'
//     //     ],
//     //     [
//     //         'idgame' => 6,
//     //         'title' => 'Fallout'
//     //     ]
//     // ];
//     return view('test.games.menu', ['games' => $games]);
// });
Route::get('test/games', [GameController::class, 'index'])->name('test.games.index');
Route::get('test/games/{game}', [GameController::class, 'show'])->name('test.games.show');


require __DIR__ . '/auth.php';
