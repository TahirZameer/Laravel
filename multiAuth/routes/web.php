<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Models\User;

use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'account'], function(){

    Route::group(['middleware' => 'guest'], function(){

        route::get('login', [LoginController::class, 'index'])->name('account.login');
        route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
        route::get('register', [LoginController::class, 'register'])->name('account.register');
        route::post('processRegister', [LoginController::class, 'processRegister'])->name('account.processRegister');

    });

    Route::group(['middleware' => 'auth'], function(){

        route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
        route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
    
    });
});


Route::group(['prefix' => 'admin'], function(){

    Route::group(['middleware' => 'admin.guest'], function(){

        route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');

    });

    Route::group(['middleware' => 'admin.auth'], function(){

        route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    
    });
});





