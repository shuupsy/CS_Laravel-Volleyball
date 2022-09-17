<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EquipesControllers;
use App\Http\Controllers\JoueursControllers;



Route::get('/', [HomeController::class, 'index']);

Route::resources([
    '/equipes' => EquipesControllers::class,
    '/joueurs' => JoueursControllers::class
]);
