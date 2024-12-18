<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\IngredientController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/dishes', [DishController::class, 'index'])->name('dishes.index');
Route::get('/dishes/{id}', [DishController::class, 'show'])->name('dishes.show');

Route::get('/ingredients/{id}', [IngredientController::class, 'show'])->name('ingredients.show');
