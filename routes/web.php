<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\EpisodioController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TemporadaController;
use App\Mail\NovaSerie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

Route::get('/series', [SeriesController::class, 'index']);
Route::get('/series/criar', [SeriesController::class, 'create'])->middleware('auth');
Route::post('/series/criar', [SeriesController::class, 'store'])->middleware('auth');
Route::delete('/series/remove/{id}', [SeriesController::class, 'destroy'])->middleware('auth');
Route::post('/series/{id}/editaNome', [SeriesController::class, 'editaNome'])->middleware('auth');

Route::get('/series/{serieId}/temporadas', [TemporadaController::class, 'index']);
Route::get('/series/{serieId}/temporadas/criar', [TemporadaController::class, 'create'])->middleware('auth');
Route::post('/series/{serieId}/temporadas/criar', [TemporadaController::class, 'store'])->middleware('auth');

Route::get('/temporadas/{temporadaId}/episodios', [EpisodioController::class, 'index']);
Route::post('/temporadas/{temporadaId}/episodios/assistir', [EpisodioController::class, 'assistir'])->middleware('auth');

Route::get('/sair', function () { Auth::logout(); return redirect('/login');});

Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/cadastro', [CadastroController::class, 'create']);
Route::post('/cadastro', [CadastroController::class, 'store']);
