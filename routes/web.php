<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FitaController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\ClienteController;

Route::get('/clientes', [ClienteController::class, 'index']);
Route::get('/clientes/novo', [ClienteController::class, 'create']);
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{id}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::get('/clientes/{id}/show', [App\Http\Controllers\ClienteController::class, 'show'])->name('clientes.show');

Route::get('/fitas', [FitaController::class, 'index']);
Route::get('/fitas/novo', [FitaController::class, 'create']);
Route::post('/fitas', [FitaController::class, 'store'])->name('fitas.store');
Route::get('/fitas/{id}/edit', [App\Http\Controllers\FitaController::class, 'edit'])->name('fitas.edit');
Route::put('/fitas/{id}', [App\Http\Controllers\FitaController::class, 'update'])->name('fitas.update');
Route::delete('/fitas/{id}', [App\Http\Controllers\FitaController::class, 'destroy'])->name('fitas.destroy');
Route::get('/fitas/{id}/show', [FitaController::class, 'show'])->name('fitas.show');

Route::get('/locacoes', [LocacaoController::class, 'index']);
Route::get('/locacoes/novo', [LocacaoController::class, 'create'])->name('locacoes.create');
Route::post('/locacoes', [LocacaoController::class, 'store'])->name('locacoes.store');
Route::delete('/locacoes/{id}', [App\Http\Controllers\LocacaoController::class, 'destroy'])->name('locacoes.destroy');
Route::get('/locacoes/{id}/edit', [LocacaoController::class, 'edit'])->name('locacoes.edit');
Route::put('/locacoes/{id}', [LocacaoController::class, 'update'])->name('locacoes.update');

Route::get('/', function () {
    return redirect('/locacoes/novo');
});
