<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GameController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;

//List Games
Route::get('/', [GameController::class, 'show'])->name('games');
// List Portals
Route::get('/portal/{game}', [PortalController::class, 'show'])->name('portal');
// Inside Wiki
Route::get('/wiki/{wiki}', [WikiController::class, 'show'])->name('wiki');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article');
// Inside Forum
Route::get('/forum/{forum}', [ForumController::class, 'show'])->name('forum');
Route::get('/discussion/{discussion}', [DiscussionController::class, 'show'])->name('discussion');
// Inside News
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news');

// Routes that needs to be Authenticated.
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
    // News
    Route::get('mod/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('mod/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::patch('mod/news/update', [NewsController::class, 'update'])->name('news.update');
    Route::get('mod/news/destroy', [NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('mod/news/{news}', [PublicationController::class, 'index'])->name('news.publications.index');
    Route::get('mod/news/{news}/create', [PublicationController::class, 'create'])->name('news.publications.create');
    Route::patch('mod/news/{news}/{publication}/update', [PublicationController::class, 'update'])->name('news.publications.update');
    Route::delete('mod/news/{news}/{publication}/destroy', [PublicationController::class, 'destroy'])->name('news.publication.destroy');


    // Wiki
    Route::get('mod/wiki', [WikiController::class, 'index'])->name('wiki.index');
    Route::get('mod/wiki/create', [WikiController::class, 'create'])->name('wiki.create');
    Route::patch('mod/wiki/update', [WikiController::class, 'update'])->name('wiki.update');
    Route::delete('mod/wiki/destroy', [WikiController::class, 'destroy'])->name('wiki.destroy');
    // Articles
    Route::get('mod/wiki/{wiki}', [ArticleController::class, 'index'])->name('wiki.article.index');
    Route::get('mod/wiki/{wiki}/create', [ArticleController::class, 'create'])->name('wiki.article.create');
    Route::patch('mod/wiki/{wiki}/{article}/update', [ArticleController::class, 'update'])->name('wiki.article.update');
    Route::delete('mod/wiki/{wiki}/{article}/destroy', [ArticleController::class, 'destroy'])->name('wiki.article.destroy');
    // Sections
    Route::get('mod/wiki/{wiki}/article/{article}', [SectionController::class, 'index'])->name('wiki.article.section.index');
    Route::get('mod/wiki/{wiki}/article/{article}/create', [SectionController::class, 'create'])->name('wiki.article.section.create');
    Route::patch('mod/wiki/{wiki}/article/{article}/{section}/update', [SectionController::class, 'update'])->name('wiki.article.section.update');
    Route::delete('mod/wiki/{wiki}/article/{article}/{section}/destroy', [SectionController::class, 'destroy'])->name('wiki.article.section.destroy');
});

// Routes that go through Administrator Authentication.
Route::middleware('adminAuth')->group(function () {

    // Role Routes
    Route::get('adm/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('adm/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::patch('adm/roles/update', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('adm/roles/destroy', [RoleController::class, 'destroy'])->name('roles.destroy');

    // User Routes
    Route::get('adm/role', [UserController::class, 'index'])->name('role.index');
    Route::get('adm/role/create', [UserController::class, 'create'])->name('role.create');
    Route::patch('adm/role/update', [UserController::class, 'update'])->name('role.update');
    Route::delete('adm/role/destroy', [UserController::class, 'destroy'])->name('role.destroy');

    // UserRole Routes
    Route::get('adm/role', [UserRoleController::class, 'index'])->name('role.index');
    Route::get('adm/role/permiso', [UserRoleController::class, 'index'])->name('role.permiso.index');
    Route::patch('adm/role/permiso/update', [UserRoleController::class, 'update'])->name('role.permiso.update');


    //Game
    Route::get('adm/game', [GameController::class, 'index'])->name('game.index');
    Route::get('adm/game/create', [GameController::class, 'create'])->name('game.create');
    Route::patch('adm/game/update', [GameController::class, 'update'])->name('game.update');
    Route::delete('adm/game/destroy', [GameController::class, 'destroy'])->name('game.destroy');
    //Portal
    Route::get('adm/game/{game}', [PortalController::class, 'index'])->name('game.portal.index');
    Route::get('adm/game/{game}/create', [PortalController::class, 'create'])->name('game.portal.create');
    Route::patch('adm/game/{games}/portal/{portal}/update', [PortalController::class, 'update'])->name('game.portal.update');
    Route::delete('adm/game/{games}/portal/{portal}/destroy', [PortalController::class, 'destroy'])->name('game.portal.destroy');
    //Forum
    Route::get('adm/game/portal/{portal}', [ForumController::class, 'index'])->name('game.portal.forum.index');
    Route::get('adm/game/portal/{portal}/create', [ForumController::class, 'create'])->name('game.portal.forum.create');
    Route::patch('adm/game/portal/{portal}/{forum}/update', [ForumController::class, 'update'])->name('game.portal.forum.update');
    Route::delete('adm/game/portal/{portal}/{forum}/destroy', [ForumController::class, 'destroy'])->name('game.portal.forum.destroy');

    //Discussion
    Route::get('adm/discussions/{discussion}', [DiscussionController::class, 'index'])->name('game.portal.forum.discussion.index');
    Route::get('adm/game/portal/{portal}/{forum}/create', [DiscussionController::class, 'create'])->name('game.portal.forum.discussion.create');
    Route::patch('adm/discussions/{discussion}/update', [DiscussionController::class, 'update'])->name('game.portal.forum.discussion.update');
    Route::delete('adm/discussions/{discussion}/destroy', [DiscussionController::class, 'destroy'])->name('game.portal.forum.discussion.destroy');

    Route::patch('adm/discussion/{discussion}/create', [ReplyController::class, 'create'])->name('game.portal.forum.discussion.reply.create');
    Route::patch('adm/discussion/{discussion}/update', [ReplyController::class, 'update'])->name('game.portal.forum.discussion.reply.update');
    Route::patch('adm/discussion/{discussion}/destroy', [ReplyController::class, 'destroy'])->name('game.portal.forum.discussion.reply.destroy');
});

require __DIR__ . '/auth.php';
