<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Category;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 2);
        $dishes = Dish::paginate($perPage)->withQueryString();
        return view('dishes.index', ['dishes' => $dishes]);
    }

    public function show($id)
    {
        $dish = Dish::with('ingredients')->findOrFail($id);
        return view('dishes.show', compact('dish'));
    }

    public function create()
    {
        $categories = Category::all();
        $ingredients = Ingredient::all();

        return view('dishes.create', ['categories' => $categories, 'ingredients' => $ingredients,
        ]);
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'cooking_method' => 'nullable|string|max:255',
            'cooking_time' => 'nullable|integer|min:0',
        ]);

        $dish = new Dish();
        $dish->name = $validatedData['name'];
        $dish->category_id = $validatedData['category_id'];
        $dish->cooking_method = $validatedData['cooking_method'];
        $dish->cooking_time = $validatedData['cooking_time'];
        $dish->save();

        return redirect()->route('dishes.show', $dish->id)->with('success', 'Блюдо успешно добавлено!');
    }

    public function update(\Illuminate\Http\Request $request, $id)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'cooking_method' => 'nullable|string|max:255',
            'cooking_time' => 'nullable|integer|min:0',
        ]);

        $dish = Dish::findOrFail($id);

        $dish->name = $validatedData['name'];
        $dish->category_id = $validatedData['category_id'];
        $dish->cooking_method = $validatedData['cooking_method'];
        $dish->cooking_time = $validatedData['cooking_time'];
        $dish->save();

        return redirect()->route('dishes.show', $dish->id)->with('success', 'Блюдо успешно обновлено!');
    }

    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();

        return redirect()->route('dishes.index')->with('success', 'Блюдо успешно удалено!');
    }

    public function edit($id)
    {
        $dish = Dish::findOrFail($id);
        $categories = Category::all();
        return view('dishes.edit', compact('dish', 'categories'));
    }

}
