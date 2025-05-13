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

Route::resource('categories', CategoryController::class);

Route::resource('dishes', DishController::class);

Route::resource('ingredients', IngredientController::class)->except(['index']);

Route::get('/dishes/category/{category}', [DishController::class, 'byCategory'])->name('dishes.byCategory');

Route::get('/dishes/create', [DishController::class, 'create'])->name('dishes.create');

Route::post('/dishes', [DishController::class, 'store'])->name('dishes.store');

Route::put('/dishes/{dish}', [DishController::class, 'update'])->name('dishes.update');
