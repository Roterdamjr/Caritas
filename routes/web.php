<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoluntarioController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\PDFController;


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



Route::get('/login', [ AuthController::class , 'login' ])->name('login');
Route::post('/login', [ AuthController::class , 'loginPost' ]) ;

Route::post('/logout', [AuthController::class, 'logout']);

// ********************************** REGISTRAR ********************************
//Route::get('/register', [ AuthController::class , 'register' ])->middleware('auth');
//Route::post('/register', [ AuthController::class , 'registerPost' ])->middleware('auth') ;


Route::get('/register', [ AuthController::class , 'register' ]);
Route::post('/register', [ AuthController::class , 'registerPost' ]) ;


// ********************************** VOLUNTARIOS ********************************
//exibir varios 
Route::get('/voluntarios/dashboard', [ VoluntarioController::class , 'dashboard' ])->middleware('auth');

//incluir
Route::get('/voluntarios/create', [ VoluntarioController::class , 'create' ])->middleware('auth');
Route::post('/voluntarios', [ VoluntarioController::class , 'store' ])->middleware('auth');


//exibir um 
Route::get('/voluntarios/{id}', [ VoluntarioController::class , 'show' ])->middleware('auth');

//alterar
Route::get('/voluntarios/edit/{id}', [ VoluntarioController::class , 'edit' ])->middleware('auth');
Route::put('/voluntarios/update/{id}', [ VoluntarioController::class , 'update' ])->middleware('auth');


//deletar
Route::delete('/voluntarios/{id}', [ VoluntarioController::class , 'destroy' ])->middleware('auth');

//imprimir
Route::get('/voluntarios/imprimir/{id}', [VoluntarioController::class, 'gerarPDF']);

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

//imprimir
Route::get('/candidatos/imprimir/{id}', [CandidatoController::class, 'gerarPDF']);

// ********************************** ALUNOS ********************************
Route::get('/alunos/choose', [ AlunoController::class , 'choose' ])->middleware('auth');

//exibir varios 
Route::get('/alunos/dashboard', [ AlunoController::class , 'dashboard' ])->middleware('auth');

//incluir
Route::get('/alunos/create/{id}', [ AlunoController::class , 'create' ])->middleware('auth');
Route::post('/alunos', [ AlunoController::class , 'store' ])->middleware('auth');

//exibir um 
Route::get('/alunos/{id}', [ AlunoController::class , 'show' ]);

//alterar
Route::get('/alunos/edit/{id}', [ AlunoController::class , 'edit' ])->middleware('auth');
Route::put('/alunos/update/{id}', [ AlunoController::class , 'update' ])->middleware('auth');

//deletar
Route::delete('/alunos/{id}', [ AlunoController::class , 'destroy' ])->middleware('auth');

//imprimir
Route::get('/alunos/imprimir/{id}', [AlunoController::class, 'gerarPDF']);
