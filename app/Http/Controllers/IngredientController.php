<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function show($id)
    {
        $ingredient = Ingredient::with('dishes')->findOrFail($id);
        return view('ingredients.show', compact('ingredient'));
    }
}
