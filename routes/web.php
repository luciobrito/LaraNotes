<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotasController;

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

Route::get('/login', [UserController::class, 'PaginaLogin']);
Route::get('/cadastro', [UserController::class, 'PaginaCadastro']);
Route::post('/cadastrar', [UserController::class, 'Cadastrar']);
Route::get('/home', [UserController::class,'Home']);
Route::post('/sair', [UserController::class, 'Sair']);
Route::post('/login',[UserController::class,'Login']);
Route::delete('/deletar-nota', [NotasController::class,'DeletarNota']);
Route::post('/criar-anotacao',[NotasController::class,'CriarNota']);
Route::get('/', function () {
    return redirect('/login');
});
