<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function show($id)
    {
        $recipe = Recipe::with(['dish', 'ingredient'])->findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }
}
