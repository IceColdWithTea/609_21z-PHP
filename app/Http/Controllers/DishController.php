<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::with('category', 'recipes')->get();
        return view('dishes.index', compact('dishes'));
    }

    public function show($id)
    {
        $dish = Dish::with(['category', 'recipes.ingredient'])->findOrFail($id);
        return view('dishes.show', compact('dish'));
    }
}
