<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/Products/create', [ProductController::class, 'create'])->name('Products.create');
route::post('/Products', [ProductController::class, 'store'])->name('Products.store');

// route::get('/Products/productList', [ProductController::class, 'index'])->name('Products.index');
route::get('/Products', [ProductController::class, 'index'])->name('Products.index');

route::get('/Products/{product}/edit', [ProductController::class, 'edit'])->name('Products.edit');

route::put('/Products/{product}', [ProductController::class, 'update'])->name('Products.update');

route::delete('/Products/{product}', [ProductController::class, 'destroy'])->name('Products.destroy');
