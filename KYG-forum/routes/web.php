<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersDbController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MenuRoleController;
use App\Http\Controllers\UserRoleController;

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




// Route::resource('games', GameController::class);
// Route::resource('collections', CollectionController::class);
// Route::resource('portals', PortalController::class);
// Route::resource('wikis', WikiController::class);
// Route::resource('news', NewsController::class);
// Route::resource('forums', ForumController::class);
// Route::resource('publications', PublicationController::class);
// Route::resource('articles', ArticleController::class);
// Route::resource('discussions', DiscussionController::class);
// Route::resource('sections', SectionController::class);
// Route::resource('replies', ReplyController::class);
// Route::resource('menus', MenuController::class);
// Route::resource('roles', RoleController::class);
// Route::resource('menuroles', MenuRoleController::class);
// Route::resource('userroles', UserRoleController::class);


// Rutas para las colecciones
// Route::get('/test_methods', function () {
//     return view('test.test_methods');
// });
// Route::get('/test/collections/create', function () {
//     return view('test.collections.create');
// });

// Route::get('/test/collections', [CollectionController::class, 'index']);
// Route::post('/test/collections', [CollectionController::class, 'store']);

// Route::get('/test/collections/{id}', [CollectionController::class, 'show']);
// Route::put('/test/collections/{id}', [CollectionController::class, 'update']);
// Route::delete('/test/collections/{id}', [CollectionController::class, 'destroy']);


Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->name('games.store');
Route::get('/games/{id}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/{id}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{id}', [GameController::class, 'update'])->name('games.update');
Route::delete('/games/{id}', [GameController::class, 'destroy'])->name('games.destroy');
Route::view('/test_methods', 'test.test_methods')->name('test_methods');


require __DIR__ . '/auth.php';
