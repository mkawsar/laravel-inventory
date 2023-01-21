<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(): object
    {
        session()->put('menu', 'user');
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
    }

    public function create(): object
    {
        session()->put('menu', 'user');
        return Inertia::render('users/Create');
    }
}
