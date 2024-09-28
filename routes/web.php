<?php

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
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\WelcomeController;

// ********************************** CANDIDATOS ********************************
//exibir varios 
Route::get('/candidatos/dashboard', [ CandidatoController::class , 'dashboard' ]);

//incluir
//Route::get('/candidatos/create', [ CandidatoController::class , 'create' ])->middleware('auth');
Route::get('/candidatos/create', [ CandidatoController::class , 'create' ]);
Route::post('/candidatos', [ CandidatoController::class , 'store' ]);


//exibir um 
Route::get('/candidatos/{id}', [ CandidatoController::class , 'show' ]);

//alterar
//Route::get('/candidatos/edit/{id}', [ CandidatoController::class , 'edit' ])->middleware('auth');
//Route::put('/candidatos/update/{id}', [ CandidatoController::class , 'update' ])->middleware('auth');
Route::get('/candidatos/edit/{id}', [ CandidatoController::class , 'edit' ]);
Route::put('/candidatos/update/{id}', [ CandidatoController::class , 'update' ]);


//deletar
//Route::delete('/candidatos/{id}', [ CandidatoController::class , 'destroy' ])->middleware('auth');
Route::delete('/candidatos/{id}', [ CandidatoController::class , 'destroy' ]);

// ********************************** ALUNOS ********************************
//exibir varios 
Route::get('/alunos/dashboard', [ AlunoController::class , 'dashboard' ]);

//incluir
//Route::get('/candidatos/create', [ CandidatoController::class , 'create' ])->middleware('auth');
Route::get('/alunos/create', [ AlunoController::class , 'create' ]);
Route::post('/alunos', [ AlunoController::class , 'store' ]);

//exibir um 
Route::get('/alunos/{id}', [ AlunoController::class , 'show' ]);

//alterar
//Route::get('/candidatos/edit/{id}', [ AlunoController::class , 'edit' ])->middleware('auth');
//Route::put('/candidatos/update/{id}', [ AlunoController::class , 'update' ])->middleware('auth');
Route::get('/alunos/edit/{id}', [ AlunoController::class , 'edit' ]);
Route::put('/alunos/update/{id}', [ AlunoController::class , 'update' ]);


//deletar
//Route::delete('/candidatos/{id}', [ AlunoController::class , 'destroy' ])->middleware('auth');
Route::delete('/alunos/{id}', [ AlunoController::class , 'destroy' ]);

// ********************************** TESTE ********************************
Route::get('/boavinda', [ WelcomeController::class , 'boavinda' ]);
Route::get('/teste', function() {
    return 'Rota de teste funcionando!';
});