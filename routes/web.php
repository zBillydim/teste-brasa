<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\ProfessorController;
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

/* INICIO ROTAS PUBLICAS */

Route::get('/', [ProfessorController::class, 'index'])->name('home');
Route::post('/registro', [AuthController::class, 'registrar'])->name('registro');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/* FIM ROTAS PUBLICAS */

/* INICIO ROTAS PRIVADAS */

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [MensagemController::class, 'dashboard'])->name('dashboard');
    Route::get('/mensagens', [MensagemController::class, 'index'])->name('mensagens.index');
    Route::get('/mensagens/nova', [MensagemController::class, 'create'])->name('nova_mensagem');
    Route::post('/create', [MensagemController::class, 'store'])->name('salvar_mensagem');
    Route::get('/mensagens/{id}', [MensagemController::class, 'show'])->name('ver_mensagem');
    Route::get('/mensagens/{id}/editar', [MensagemController::class, 'edit'])->name('editar_mensagem');
    Route::put('/mensagens/{id}', [MensagemController::class, 'update'])->name('atualizar_mensagem');
    Route::delete('/mensagens/{id}', [MensagemController::class, 'destroy'])->name('excluir_mensagem');
});

/* FIM ROTAS PRIVADAS */