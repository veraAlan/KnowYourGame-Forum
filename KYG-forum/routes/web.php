<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testDatabaseController;

use App\Http\Controllers\GameController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\SectionController;

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




// TODO Refactor
// TODO Needs TOO MUCH REFACTOR.
Route::get('/database/tables', function () {
    testDatabaseController::showDatabaseTables();
});

// Below: Only works as ADMIN pages, for user/mod pages URI should be shorter/more meaningful.
// WIKI functions.
Route::redirect('/wiki', '/wiki/list', 301);
Route::redirect('/wiki/{idwiki}/article/{idarticle}', '/wiki/{idwiki}/article/{idarticle}/show', 301);

Route::get('/wiki/list', function () {
    return view('test.wiki.list', ['wikis' => WikiController::getAll()]);
});

Route::get('/wiki/create', function () {
    //  This can be handled by controller after middleware.
    $portals = PortalController::index();
    return view('test.wiki.create', ['portals' => $portals]);
});

Route::get('/wiki/{idwiki}/edit', function ($idwiki) {
    //  This can be handled by controller after middleware.
    $portals = PortalController::index();
    return view('test.wiki.edit', ['portals' => $portals, 'wiki' => WikiController::findFrom('idwiki', $idwiki)[0]]);
});

Route::post('/wiki/{idwiki}/update', [WikiController::class, 'edit']);
Route::post('/insert-wiki', [WikiController::class, 'insert']);

// From here: GameController::findID() isn't defined, need some helper function to get those, maybe use the controller wihtout redirecting to the page redirection.
// ARTICLE functions
Route::get('/wiki/{idwiki}/article/list', function ($idwiki) {
    //  This can be handled by controller after middleware.
    $wiki = WikiController::findFrom('idwiki', $idwiki)[0];
    $portal = PortalController::findFrom('idportal', $wiki->idportal)[0];
    return view('test.wiki.article.list', ['articles' => ArticleController::getAll($idwiki), 'game' => GameController::findID($portal->idgame), 'wiki' => $wiki]);
});

Route::get('/wiki/{idwiki}/article/create', function ($idwiki) {
    //  This can be handled by controller after middleware.
    $wiki = WikiController::findFrom('idwiki', $idwiki)[0];
    $portal = PortalController::findFrom('idportal', $wiki->idportal)[0];
    return view('test.wiki.article.create', ['game' => GameController::findID($portal->idgame), 'idwiki' => $idwiki]);
});

Route::post('/wiki/{idwiki}/article/insert', [ArticleController::class, 'insert']);

// SECTION functions
Route::get('/wiki/{idwiki}/article/{idarticle}/show', function ($idwiki, $idarticle) {
    //  This can be handled by controller after middleware.
    $wiki = WikiController::findFrom('idwiki', $idwiki)[0];
    $portal = PortalController::findFrom('idportal', $wiki->idportal)[0];
    return view('test.wiki.article.section.list', ['sections' => SectionController::findFrom('idarticle', $idarticle), 'game' => GameController::findID($portal->idgame), 'id' => $idarticle]);
});

Route::get('/wiki/{idwiki}/article/{idarticle}/create', function ($idwiki, $idarticle) {
    //  This can be handled by controller after middleware.
    $wiki = WikiController::findFrom('idwiki', $idwiki)[0];
    $portal = PortalController::findFrom('idportal', $wiki->idportal)[0];
    return view('test.wiki.article.section.create', ['game' => GameController::findID($portal->idgame), 'idwiki' => $idwiki, 'idarticle' => $idarticle]);
});

Route::post('/wiki/{idwiki}/article/{idarticle}/insert', [SectionController::class, 'insert']);

// TODO Refactor up till here. ^^^




//Rotas de Games
Route::get('test/games', [GameController::class, 'index'])->name('test.games.index');
Route::get('test/games/create', [GameController::class, 'create'])->name('test.games.create');
Route::post('test/games', [GameController::class, 'store'])->name('test.games.store');
Route::get('test/games/{games}', [GameController::class, 'show'])->name('test.games.show');
Route::get('test/games/{games}/edit', [GameController::class, 'edit'])->name('test.games.edit');
Route::patch('test/games/{games}', [GameController::class, 'update'])->name('test.games.update');
Route::delete('test/games/{games}', [GameController::class, 'destroy'])->name('test.games.destroy');

//Rotas de Collections
Route::get('test/collections', [CollectionController::class, 'index'])->name('test.collections.index');
Route::get('test/collections/create', [CollectionController::class, 'create'])->name('test.collections.create');
Route::post('test/collections', [CollectionController::class, 'store'])->name('test.collections.store');
Route::get('test/collections/{collections}', [CollectionController::class, 'show'])->name('test.collections.show');
Route::get('test/collections/{collections}/edit', [CollectionController::class, 'edit'])->name('test.collections.edit');
Route::patch('test/collections/{collections}', [CollectionController::class, 'update'])->name('test.collections.update');
Route::delete('test/collections/{collections}', [CollectionController::class, 'destroy'])->name('test.collections.destroy');

//Rotas de Portals
Route::get('test/portals', [PortalController::class, 'index'])->name('test.portals.index');
Route::get('test/portals/create', [PortalController::class, 'create'])->name('test.portals.create');
Route::post('test/portals', [PortalController::class, 'store'])->name('test.portals.store');
Route::get('test/portals/{portals}', [PortalController::class, 'show'])->name('test.portals.show');
Route::get('test/portals/{portals}/edit', [PortalController::class, 'edit'])->name('test.portals.edit');
Route::patch('test/portals/{portals}', [PortalController::class, 'update'])->name('test.portals.update');
Route::delete('test/portals/{portals}', [PortalController::class, 'destroy'])->name('test.portals.destroy');

//Rotas de Forums
Route::get('test/forums', [ForumController::class, 'index'])->name('test.forums.index');
Route::get('test/forums/create', [ForumController::class, 'create'])->name('test.forums.create');
Route::post('test/forums', [ForumController::class, 'store'])->name('test.forums.store');
Route::get('test/forums/{forums}', [ForumController::class, 'show'])->name('test.forums.show');
Route::get('test/forums/{forums}/edit', [ForumController::class, 'edit'])->name('test.forums.edit');
Route::patch('test/forums/{forums}', [ForumController::class, 'update'])->name('test.forums.update');
Route::delete('test/forums/{forums}', [ForumController::class, 'destroy'])->name('test.forums.destroy');

//Rotas de Discussions
Route::get('test/discussions', [DiscussionController::class, 'index'])->name('test.discussions.index');
Route::get('test/discussions/create', [DiscussionController::class, 'create'])->name('test.discussions.create');
Route::post('test/discussions', [DiscussionController::class, 'store'])->name('test.discussions.store');
Route::get('test/discussions/{discussions}', [DiscussionController::class, 'show'])->name('test.discussions.show');
Route::get('test/discussions/{discussions}/edit', [DiscussionController::class, 'edit'])->name('test.discussions.edit');
Route::patch('test/discussions/{discussions}', [DiscussionController::class, 'update'])->name('test.discussions.update');
Route::delete('test/discussions/{discussions}', [DiscussionController::class, 'destroy'])->name('test.discussions.destroy');

//Rotas de Replies


require __DIR__ . '/auth.php';
