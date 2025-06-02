<?php

declare(strict_types=1);

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function (): void {
   Route::get('dashboard', DashboardController::class)->name('dashboard');
});

Route::get('/', WelcomeController::class)->name('welcome');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
