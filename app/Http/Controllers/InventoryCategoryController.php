<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InventoryCategoryController extends Controller
{
    public function index(): object
    {
        session()->put('menu', 'category');
        return Inertia::render('category/list');
    }
}
