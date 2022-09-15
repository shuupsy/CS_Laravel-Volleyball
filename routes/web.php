<?php

use App\Http\Controllers\EquipesControllers;
use App\Http\Controllers\JoueursControllers;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('pages.home');
});

Route::resources([
    '/equipes' => EquipesControllers::class,
    '/joueurs' => JoueursControllers::class
]);
