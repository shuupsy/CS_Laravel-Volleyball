<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $all_equipes = Equipe::all();

        return view('pages.home', compact('all_equipes'));

    }
}
