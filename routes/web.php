<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('usuarios', [UsuariosController::class, 'index']);
Route::get('usuarios/novo', [UsuariosController::class, 'create']);
Route::get('usuarios/editar/{id}', [UsuariosController::class, 'edit']);
Route::get('usuarios/excluir/{id}', [UsuariosController::class, 'destroy']);
Route::get('usuarios/{id}', [UsuariosController::class, 'show']);
//Route::post('usuarios/gravar/{id}', [UsuariosController::class, 'update']);
//Route::post('usuarios/salvar', [UsuariosController::class, 'store']);

Route::post('/usuarios', [UsuariosController::class, 'store']);
Route::patch('/usuarios/{usuarioId}', [UsuariosController::class, 'update']);


//Route::get('home', [HomeController::class, 'index']);
//Route::get('users', [HomeController::class, 'users']);
//Route::get('users-db', [HomeController::class, 'usersDatabase']);

Route::get('/', function () {
    return view('welcome');
});
