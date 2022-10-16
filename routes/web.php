<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home', [
        'username' => 'John Doe'
    ]);
});

Route::get('/users', function () {
    return Inertia::render('Users', [
        'users' => User::query()->paginate(10)->through(fn($user) => [
            'id' => $user->id,
            'name' => $user->name
        ])
    ]);
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});


Route::post('/logout', function () {
    dd(request('foo'));
});
