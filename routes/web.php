<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\AlunoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [ AuthController::class , 'register' ]);
Route::post('/register', [ AuthController::class , 'registerPost' ]) ;

Route::get('/login', [ AuthController::class , 'login' ])->name('login');
Route::post('/login', [ AuthController::class , 'loginPost' ]) ;

Route::post('/logout', [AuthController::class, 'logout']);

// ********************************** CANDIDATOS ********************************
//exibir varios 
Route::get('/candidatos/dashboard', [ CandidatoController::class , 'dashboard' ])->middleware('auth');

//incluir
Route::get('/candidatos/create', [ CandidatoController::class , 'create' ])->middleware('auth');
Route::post('/candidatos', [ CandidatoController::class , 'store' ])->middleware('auth');


//exibir um 
Route::get('/candidatos/{id}', [ CandidatoController::class , 'show' ])->middleware('auth');

//alterar
Route::get('/candidatos/edit/{id}', [ CandidatoController::class , 'edit' ])->middleware('auth');
Route::put('/candidatos/update/{id}', [ CandidatoController::class , 'update' ])->middleware('auth');


//deletar
Route::delete('/candidatos/{id}', [ CandidatoController::class , 'destroy' ])->middleware('auth');

// ********************************** ALUNOS ********************************
//exibir varios 
Route::get('/alunos/dashboard', [ AlunoController::class , 'dashboard' ])->middleware('auth');

//incluir

Route::get('/alunos/create', [ AlunoController::class , 'create' ])->middleware('auth');
Route::post('/alunos', [ AlunoController::class , 'store' ])->middleware('auth');

//exibir um 
Route::get('/alunos/{id}', [ AlunoController::class , 'show' ]);

//alterar
Route::get('/alunos/edit/{id}', [ AlunoController::class , 'edit' ])->middleware('auth');
Route::put('/alunos/update/{id}', [ AlunoController::class , 'update' ])->middleware('auth');


//deletar
Route::delete('/alunos/{id}', [ AlunoController::class , 'destroy' ])->middleware('auth');

