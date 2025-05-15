<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello world!']);
});

Route::resource('categories', CategoryController::class);

Route::resource('dishes', DishController::class);

Route::resource('ingredients', IngredientController::class)->except(['index']);

Route::get('/dishes/category/{category}', [DishController::class, 'byCategory']);

Route::get('/dishes/create', [DishController::class, 'create'])->middleware('auth');

Route::get('/dishes/{dish}/edit', [DishController::class, 'edit'])->middleware('auth');

Route::match(['put', 'patch'], '/dishes/{dish}', [DishController::class, 'update'])->middleware('auth');

Route::delete('/dishes/{dish}', [DishController::class, 'destroy'])->middleware('auth');

Route::post('/dishes', [DishController::class, 'store']);

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/auth', [LoginController::class, 'authenticate']);

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});
