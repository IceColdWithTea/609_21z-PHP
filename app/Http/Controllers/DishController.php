<?php

namespace App\Http\Controllers;

use App\Models\Dish;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::all();
        return view('dishes.index', compact('dishes'));
    }

    public function show($id)
    {
        $dish = Dish::with('ingredients')->findOrFail($id);
        return view('dishes.show', compact('dish'));
    }
}
