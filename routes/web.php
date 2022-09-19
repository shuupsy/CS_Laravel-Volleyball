<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipesControllers;
use App\Http\Controllers\JoueursControllers;



Route::get('/', [HomeController::class, 'index'])->name('home');

/* Route::resource('/equipes', EquipesControllers::class);
Route::resource('/joueurs', JoueursControllers::class); */

Route::resource('/equipes', EquipesControllers::class, ['names' => 'equipes']);
Route::resource('/joueurs', JoueursControllers::class);

