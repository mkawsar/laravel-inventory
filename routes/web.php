<?php

use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate']);

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Home', [
            'username' => 'John Doe'
        ]);
    });

    Route::get('/users', function () {
        return Inertia::render('users/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name
                ]),
            'filter' => Request::only(['search'])
        ]);
    });

    Route::get('users/create', function () {
        return Inertia::render('users/Create');
    });

    Route::post('users', function () {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        User::create($attributes);
        return redirect('/users');
    });

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });


    Route::post('/logout', function () {
        dd(request('foo'));
    });
});
