<?php

use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->role == 'admin') {
            return view('panelControl');
        }
    }
    return view('index');
});

Route::get('/verUsuarios', function () {
    return view('verUsuarios');
});

Route::get('/verPosts', function () {
    return view('verPosts');
});

Route::get('/verCategorias', function () {
    return view('verCategorias');
});

Route::get('/añadirPost', function () {
    $categorias = Categoria::all();
    return view('añadirPost', compact('categorias'));
})->middleware('auth.admin');

Route::get('/añadirCategoria', function () {
    return view('añadirCategoria');
})->middleware('auth.admin');

Route::get('/editarPost', function () {
    $categorias = Categoria::all();
    return view('editarPost', compact('categorias'));
})->middleware('auth.admin');

Route::get('/editarCategoria', function () {
    return view('editarCategoria');
})->middleware('auth.admin');

Route::get('/editarUsuarios', function () {
    return view('editarUsuarios');
})->middleware('auth.admin');

Route::get('/añadirUsuarios', function () {
    return view('añadirUsuarios');
})->middleware('auth.admin');

Route::get('/editarPerfil', function () {
    return view('editarPerfil');
});

Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth.admin');

Route::get('/postCreate', [PostController::class, 'create'])->middleware('auth.admin');

Route::get('/postDelete', [PostController::class, 'delete'])->middleware('auth.admin');

Route::get('/postView', [PostController::class, 'view']);

Route::get('/postEdit', [PostController::class, 'edit'])->middleware('auth.admin');

Route::get('/verPostsCategoria', [CategoriaController::class, 'viewPosts']);

Route::get('/verCategoriaPosts', [PostController::class, 'verCategoriaPosts']);

Route::get('/verAutorPosts', [PostController::class, 'verAutorPosts']);

Route::get('/categoriaCreate', [CategoriaController::class, 'create'])->middleware('auth.admin');

Route::get('/categoriaDelete', [CategoriaController::class, 'delete'])->middleware('auth.admin');

Route::get('/categoriaView', [CategoriaController::class, 'view']);

Route::get('/categoriaEdit', [CategoriaController::class, 'edit'])->middleware('auth.admin');

Route::get('/userCreate', [UserController::class, 'create'])->middleware('auth.admin');

Route::get('/userDelete', [UserController::class, 'delete'])->middleware('auth.admin');

Route::get('/userEditFromAdmin', [UserController::class, 'editFromAdmin'])->middleware('auth.admin');

Route::get('/userEditFromSession', [UserController::class, 'editFromSession']);

Route::get('/userView', [UserController::class, 'view'])->middleware('auth.admin');

Auth::routes();
