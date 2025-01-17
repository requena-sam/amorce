<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetenteController;
use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Detente\Detente as DetenteComponent;


require __DIR__.'/auth.php';


Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

//Finances
Route::get('finances', [FinancesController::class, 'index'])->name('finances');

Route::get('profile', [ProfileController::class, 'index'])->middleware(['auth'])->name('profile');//Transaction
Route::get('transactions', [TransactionsController::class, 'index'])->name('transactions');
Route::get('meetings', [MeetingsController::class, 'index'])->name('meetings');
Route::get('feedbacks', [FeedbacksController::class, 'index'])->name('feedbacks');
Route::get('tasks', [TasksController::class, 'index'])->name('tasks');
Route::get('users', [UsersController::class, 'index'])->name('users');
Route::get('projets', [ProjetsController::class, 'index'])->name('projets');

//Detente
Route::get('detente', [DetenteController::class, 'index'])->name('detente');
Route::get('/detente/{detente}', DetenteComponent::class)->name('detente.individual');

Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
