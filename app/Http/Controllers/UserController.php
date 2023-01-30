<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(): object
    {
        session()->put('menu', 'user');
        $users = User::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->orderBy('name', 'asc')
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => ucfirst($user->role->name),
                'created_at' => $user->created_at
            ]);
        return Inertia::render('users/Index', [
            'users' => $users,
            'filter' => Request::only(['search'])
        ]);
    }

    public function create(): object
    {
        session()->put('menu', 'user');

        $roles = Role::query()->get();

        return Inertia::render('users/Create', [
            'roles' => $roles
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        if (User::create($request->all())) {
            return redirect()->route('users.index')->with('success', 'User created successfully');
        }
        return back()->with('error', 'Failed to user create!');
    }
}
