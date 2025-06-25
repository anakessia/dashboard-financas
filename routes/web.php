<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\SessionAuth;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login'); 

// Rotas de login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([SessionAuth::class])->group(function () {

    // Dashboard 
    Route::get('/dashboard', [DashboardController::class, 'index'])
          ->name('dashboard');

    // CRUD de despesas
    Route::resource('expenses', ExpenseController::class);

    // Relatório PDF do mês
   Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
   Route::get('/reports/pdf', [ReportController::class, 'generatePDF'])->name('reports.pdf');
   Route::get('/reports/monthly', [ReportController::class, 'monthly'])->name('reports.monthly');

});



