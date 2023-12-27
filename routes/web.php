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



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/mensagem/{id}/edit', [MensagemController::class, 'edit'])->name('mensagem.edit');
    Route::delete('/mensagem/{id}', [MensagemController::class, 'destroy'])->name('mensagem.destroy');
});
