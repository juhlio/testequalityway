<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Route;


//Rota Inicial
Route::get('/', [HomeController::class, 'index'])->name('home');

//Rotas de clientes
Route::get('/clientes', [ClientController::class, 'index'])->name('homeClients');

Route::get('/clientes/novo', [ClientController::class, 'newClient'])->name('newClient');
Route::post('/clientes/novo', [ClientController::class, 'store']);

Route::get('/clientes/{id}', [ClientController::class, 'getClient'])->name('getClient');
Route::delete('clientes/{id}/delete', [ClientController::class, 'destroy'])->name('deleteClient');

Route::get('/clientes/{id}/editar', [ClientController::class, 'edit'])->name('editClient');
Route::put('/clientes/{id}/editar', [ClientController::class, 'update']);

//Rotas de Projetos
Route::get('/projetos', [ProjectsController::class,'index'])->name('homeProjects');

Route::get('projetos/novo', [ProjectsController::class, 'newProject'])->name('newProject');
Route::post('projetos/novo', [ProjectsController::class, 'store']);

Route::get('/projetos/{id}', [ProjectsController::class, 'getProject'])->name('getProject');
Route::delete('projetos/{id}/delete', [ProjectsController::class, 'destroy'])->name('deleteProject');

Route::get('/projetos/{id}/editar', [ProjectsController::class, 'edit'])->name('editProject');
Route::put('/projetos/{id}/editar', [ProjectsController::class, 'update']);



