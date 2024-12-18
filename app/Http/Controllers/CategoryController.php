<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('dishes')->get();
        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::with('dishes')->findOrFail($id);
        return view('categories.show', compact('category'));
    }
}
