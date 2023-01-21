<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(): object
    {
        session()->put('menu', 'dashboard');
        return Inertia::render('Home');
    }
}
