<?php

use App\Http\Controllers\DetenteController;
use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

//Finances
Route::get('finances', [FinancesController::class, 'index'])->name('finances');

//Transactions
Route::get('transactions', [TransactionsController::class, 'index'])->name('transactions');
Route::get('meetings', [MeetingsController::class, 'index'])->name('meetings');
Route::get('feedbacks', [FeedbacksController::class, 'index'])->name('feedbacks');
Route::get('tasks', [TasksController::class, 'index'])->name('tasks');
Route::get('users', [UsersController::class, 'index'])->name('users');
Route::get('detente', [DetenteController::class, 'index'])->name('detente');
require __DIR__.'/auth.php';
