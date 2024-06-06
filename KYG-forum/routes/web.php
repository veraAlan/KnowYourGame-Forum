<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testDatabaseController;

use App\Http\Controllers\GameController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\SectionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/unauthorized', function () {
    return view('unauthorized');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes that go through Moderator Authentication.
Route::middleware('modAuth')->group(function () {
    // Wiki
    Route::get('wiki/mod', [WikiController::class, 'index'])->name('wiki.index');
    Route::get('wiki/create', [WikiController::class, 'create'])->name('wiki.create');
    Route::patch('wiki/update', [WikiController::class, 'update'])->name('wiki.update');
    Route::delete('wiki/destroy', [WikiController::class, 'destroy'])->name('wiki.destroy');
    // Articles
    Route::get('wiki/{wiki}/mod', [ArticleController::class, 'index'])->name('wiki.article.index');
    Route::get('wiki/{wiki}/article/create', [ArticleController::class, 'create'])->name('wiki.article.create');
    Route::patch('wiki/{wiki}/{article}/update', [ArticleController::class, 'update'])->name('wiki.article.update');
    Route::delete('wiki/{wiki}/{article}/destroy', [ArticleController::class, 'destroy'])->name('wiki.article.destroy');
    // Sections
    // TODO Not implemented yet.
    Route::get('wiki/{wiki}/{article}/mod', [SectionController::class, 'index'])->name('wiki.article.section.index');
});

// Test all data in database. (No auth needed)
Route::get('/database/tables', function () {
    testDatabaseController::showDatabaseTables();
});


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


require __DIR__ . '/auth.php';
