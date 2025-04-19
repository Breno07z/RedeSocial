<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');


Route::get('/registro', [AuthController::class, 'showRegistrationForm'])->name('pages.Registro');

Route::get('/HealthConnect', function () {
    return view('pages.message');
});

Route::get('/explore', function () {
    return view('pages.explore');
})->name('pages.explore');

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/editar-perfil', [UsuarioController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::put('/atualizar-perfil', [UsuarioController::class, 'update'])->name('user.update')->middleware('auth');

// Para mostrar o perfil do usuário logado
Route::get('/meu-perfil', [AuthController::class, 'profile'])
    ->name('user.profile')
    ->middleware('auth');

// Para mostrar o perfil de outro usuário
Route::get('/perfil/{id}', [UsuarioController::class, 'paginaUsuario'])
    ->name('user.show');

Route::get('/perfil', [UsuarioController::class, 'paginaUsuario'])
    ->name('user.own')
    ->middleware('auth');


    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');