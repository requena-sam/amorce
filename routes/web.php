<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetenteController;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetsController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Detente\Detente as DetenteComponent;


require __DIR__.'/auth.php';


Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

//Finances
Route::get('finances', [FinancesController::class, 'index'])->name('finances')->middleware(['auth']);

Route::get('profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile')->middleware(['auth']);
Route::get('transactions', [TransactionsController::class, 'index'])->name('transactions')->middleware(['auth']);
Route::get('users', [UsersController::class, 'index'])->name('users')->middleware(['auth']);
Route::get('projets', [ProjetsController::class, 'index'])->name('projets')->middleware(['auth']);

//Detente
Route::get('detente', [DetenteController::class, 'index'])->name('detente')->middleware(['auth']);
Route::get('/detente/{detente}', DetenteComponent::class)->name('detente.individual')->middleware(['auth']);

Route::post('logout', [LogoutController::class, 'logout'])->name('logout')->middleware(['auth']);
