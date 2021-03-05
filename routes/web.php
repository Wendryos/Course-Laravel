<?php

use App\Http\Controllers\{
	PostController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->group(function() {

	// Ação que realiza a pesquisa de uma postagem
	Route::any('/posts/search',   [PostController::class, 'search'])->name('posts.search');
	// Página inicial da aplicação post
	Route::get('/posts',           [PostController::class, 'index'])->name('posts.index');
	// Ação que realiza o cadastro do post
	Route::post('/posts',          [PostController::class, 'store'])->name('posts.store');
	// Página para criar novos post
	Route::get('/posts/create',    [PostController::class, 'create'])->name('posts.create');
	// Página para exibir detalhes do post
	Route::get('/posts/{id}',      [PostController::class, 'show'])->name('posts.show');
	// Ação que realiza o delete do post
	Route::delete('/posts/{id}',   [PostController::class, 'destroy'])->name('posts.destroy');
	// Ação que realiza a edição do post
	Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
	// Ação que realiza o update do post
	Route::put('/posts/{id}',      [PostController::class, 'update'])->name('posts.update');

});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


