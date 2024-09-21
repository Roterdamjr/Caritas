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