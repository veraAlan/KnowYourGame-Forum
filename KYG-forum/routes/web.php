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
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/unauthorized', function () {
    return view('auth.unauthorized');
});

Route::get('/not-logged', function () {
    return view('auth.not-logged');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes that go through Moderator Authentication.
Route::middleware('modAuth')->group(function () {
    Route::get('mod/wiki', [WikiController::class, 'index'])->name('wiki.index');

    // Wiki
    Route::get('mod/wiki', [WikiController::class, 'index'])->name('wiki.index');
    Route::get('mod/wiki/create', [WikiController::class, 'create'])->name('wiki.create');
    Route::patch('mod/wiki/update', [WikiController::class, 'update'])->name('wiki.update');
    Route::delete('mod/wiki/destroy', [WikiController::class, 'destroy'])->name('wiki.destroy');
    // Articles
    Route::get('mod/{wiki}', [ArticleController::class, 'index'])->name('wiki.article.index');
    Route::get('mod/{wiki}/create', [ArticleController::class, 'create'])->name('wiki.article.create');
    Route::patch('mod/{wiki}/{article}/update', [ArticleController::class, 'update'])->name('wiki.article.update');
    Route::delete('mod/{wiki}/{article}/destroy', [ArticleController::class, 'destroy'])->name('wiki.article.destroy');
    // Sections
    Route::get('mod/{wiki}/{article}', [SectionController::class, 'index'])->name('wiki.article.section.index');
    Route::get('mod/{wiki}/{article}/create', [SectionController::class, 'create'])->name('wiki.article.section.create');
    Route::patch('{wiki}/{article}/{section}/update', [SectionController::class, 'update'])->name('wiki.article.section.update');
    Route::delete('mod/{wiki}/{article}/{section}/destroy', [SectionController::class, 'destroy'])->name('wiki.article.section.destroy');
});

Route::middleware('adminAuth')->group(function () {
    //Game
    Route::get('adm/game', [GameController::class, 'index'])->name('game.index');
    Route::get('adm/game/create', [GameController::class, 'create'])->name('game.create');
    Route::patch('adm/game/update', [GameController::class, 'update'])->name('game.update');
    Route::delete('adm/game/destroy', [GameController::class, 'destroy'])->name('game.destroy');
    //Portal
    Route::get('adm/{game}', [PortalController::class, 'index'])->name('game.portal.index');
    // Route::get('test/games', [GameController::class, 'index'])->name('test.games.index'); LISTO
    // Route::get('test/games/create', [GameController::class, 'create'])->name('test.games.create');
    // Route::post('test/games', [GameController::class, 'store'])->name('test.games.store');
    // Route::get('test/games/{games}', [GameController::class, 'show'])->name('test.games.show');
    // Route::get('test/games/{games}/edit', [GameController::class, 'edit'])->name('test.games.edit');
    // Route::patch('test/games/{games}', [GameController::class, 'update'])->name('test.games.update');
    // Route::delete('test/games/{games}', [GameController::class, 'destroy'])->name('test.games.destroy');
});

Route::get('test/news/{news}', [NewsController::class, 'index'])->name('test.news.index');
Route::get('test/{news}/publications/create', [PublicationController::class, 'create'])->name('test.news.publications.create');
Route::post('test/news/{news}', [PublicationController::class, 'store'])->name('test.news.publications.store');
Route::get('test/news/publication/{publication}', [PublicationController::class, 'show'])->name('test.news.publications.show');
Route::get('test/news/publication/{publication}/edit', [PublicationController::class, 'edit'])->name('test.news.publications.edit');
Route::patch('test/news/publication/{publication}', [PublicationController::class, 'update'])->name('test.news.publications.update');
Route::delete('test/news/{news}/{publication}', [PublicationController::class, 'destroy'])->name('test.news.publications.destroy');


// Test all data in database. (No auth needed)
Route::get('/database/tables', function () {
    testDatabaseController::showDatabaseTables();
});


//Rotas de Games
// Route::get('test/games', [GameController::class, 'index'])->name('test.games.index');
// Route::get('test/games/create', [GameController::class, 'create'])->name('test.games.create');
// Route::post('test/games', [GameController::class, 'store'])->name('test.games.store');
// Route::get('test/games/{games}', [GameController::class, 'show'])->name('test.games.show');
// Route::get('test/games/{games}/edit', [GameController::class, 'edit'])->name('test.games.edit');
// Route::patch('test/games/{games}', [GameController::class, 'update'])->name('test.games.update');
// Route::delete('test/games/{games}', [GameController::class, 'destroy'])->name('test.games.destroy');

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
Route::get('test/replies', [ReplyController::class, 'index'])->name('test.replies.index');
Route::get('test/replies/create', [ReplyController::class, 'create'])->name('test.replies.create');
Route::post('test/replies', [ReplyController::class, 'store'])->name('test.replies.store');
Route::get('test/replies/{replies}', [ReplyController::class, 'show'])->name('test.replies.show');
Route::get('test/replies/{replies}/edit', [ReplyController::class, 'edit'])->name('test.replies.edit');
Route::patch('test/replies/{replies}', [ReplyController::class, 'update'])->name('test.replies.update');
Route::delete('test/replies/{replies}', [ReplyController::class, 'destroy'])->name('test.replies.destroy');

//Rotas de Users
Route::get('test/users', [UserController::class, 'index'])->name('test.users.index');
Route::get('test/users/create', [UserController::class, 'create'])->name('test.users.create');
Route::post('test/users', [UserController::class, 'store'])->name('test.users.store');
Route::get('test/users/{users}', [UserController::class, 'show'])->name('test.users.show');
Route::get('test/users/{users}/edit', [UserController::class, 'edit'])->name('test.users.edit');
Route::patch('test/users/{users}', [UserController::class, 'update'])->name('test.users.update');
Route::delete('test/users/{users}', [UserController::class, 'destroy'])->name('test.users.destroy');

//INCOMPLETO COMPLETARRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//INCOMPLETO COMPLETARRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//INCOMPLETO COMPLETARRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR
//Rotas de Userroles
// Route::get('test/userroles', [UserRoleController::class, 'index'])->name('test.userroles.index');
// Route::get('test/userroles/create', [UserRoleController::class, 'create'])->name('test.userroles.create');
// Route::post('test/userroles', [UserRoleController::class, 'store'])->name('test.userroles.store');
// Route::get('test/userroles/{user_id}', [UserRoleController::class, 'show'])->name('test.userroles.show');
// Route::get('test/userroles/{user_id}/edit', [UserRoleController::class, 'edit'])->name('test.userroles.edit');
//Route::patch('test/userroles/{user_id}', [UserRoleController::class, 'update'])->name('test.userroles.update');


//Rotas de Userroles
Route::get('test/roles', [RoleController::class, 'index'])->name('test.roles.index');
Route::get('test/roles/create', [RoleController::class, 'create'])->name('test.roles.create');
Route::post('test/roles', [RoleController::class, 'store'])->name('test.roles.store');
Route::get('test/roles/{roles}', [RoleController::class, 'show'])->name('test.roles.show');
Route::get('test/roles/{roles}/edit', [RoleController::class, 'edit'])->name('test.roles.edit');
Route::patch('test/roles/{roles}', [RoleController::class, 'update'])->name('test.roles.update');
Route::delete('test/roles/{roles}', [RoleController::class, 'destroy'])->name('test.roles.destroy');


//Rotas de Menus
// NO FUNCIONA 
Route::get('test/menus', [MenuController::class, 'index'])->name('test.menus.index');
Route::get('test/menus/create', [MenuController::class, 'create'])->name('test.menus.create');
Route::post('test/menus', [MenuController::class, 'store'])->name('test.menus.store');
Route::get('test/menus/{menus}', [MenuController::class, 'show'])->name('test.menus.show');
Route::get('test/menus/{menus}/edit', [MenuController::class, 'edit'])->name('test.menus.edit');
Route::patch('test/menus/{menus}', [MenuController::class, 'update'])->name('test.menus.update');
Route::delete('test/menus/{menus}', [MenuController::class, 'destroy'])->name('test.menus.destroy');

require __DIR__ . '/auth.php';
