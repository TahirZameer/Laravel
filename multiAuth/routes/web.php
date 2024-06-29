<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/account/login', [LoginController::class, 'index'])->name('account.login');
route::post('/account/authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');

route::get('/account/register', [LoginController::class, 'register'])->name('account.register');
route::post('/account/processRegister', [LoginController::class, 'processRegister'])->name('account.processRegister');

route::get('/account/dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
