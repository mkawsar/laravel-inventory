<?php

use App\Http\Controllers\InventoryCategoryController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['auth', 'roles'],
    'roles' => ['admin', 'maintainer', 'keeper']
], function () {
    Route::name('category.')->prefix('category')->group(function () {
        Route::get('/list', [InventoryCategoryController::class, 'index'])->name('index');
    });
});
