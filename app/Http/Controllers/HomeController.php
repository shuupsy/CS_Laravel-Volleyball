<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $full_team = Equipe::withCount('joueurs')
            ->has('joueurs', 6)
            ->orderBy('nom_equipe', 'asc')
            ->get();

        $nonfull_team = Equipe::withCount('joueurs')
            ->has('joueurs', '<', 6)
            ->orderBy('nom_equipe', 'asc')
            ->get();

        $noteam_player = Joueur::where('equipe_id', null)
            ->take(4)
            ->get();

        $withteam_player = Joueur::whereNot('equipe_id', null)
            ->take(4)
            ->get();

        $europe_team = Equipe::where('continent_id', 1)->get();
        $outside_team = Equipe::whereNot('continent_id', 1)
            ->orderBy('continent_id', 'asc')
            ->get();

        $withteam_female = Joueur::whereNot('equipe_id', null)
            ->where('genre', 'F')
            ->get();

        $withteam_male = Joueur::whereNot('equipe_id', null)
            ->whereNot('genre', 'F')
            ->get();


        return view('pages.home', compact('full_team', 'nonfull_team', 'noteam_player', 'withteam_player', 'europe_team', 'outside_team', 'withteam_female', 'withteam_male'));

    }
}
