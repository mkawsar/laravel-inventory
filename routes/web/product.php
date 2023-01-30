<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'roles'],
    'roles' => ['admin', 'maintainer', 'keeper']
], function () {
    Route::name('product.')->prefix('product')->group(function () {
        Route::get('/list', [ProductController::class, 'index'])->name('index');
    });
});
