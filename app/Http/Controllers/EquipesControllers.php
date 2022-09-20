<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Continent;
use Illuminate\Http\Request;

class EquipesControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::withCount('joueurs')->get();
        $continents = Continent::all();
        return view('pages.equipes', compact('equipes', 'continents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_equipe = new Equipe();
        $new_equipe -> nom_equipe = $request -> nom;
        $new_equipe -> ville = $request -> ville;
        $new_equipe -> pays = $request -> pays;
        $new_equipe -> nb_joueurs_max = $request -> joueurs;
        $new_equipe -> continent_id = $request -> continent;

        $new_equipe->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipe = Equipe::where('id', $id)
                    ->withCount('joueurs')
                    ->first();      
        $joueurs_equipe = Joueur::where('equipe_id', $id)
                                ->get();
        return view('pages.show_equipe', compact('equipe', 'joueurs_equipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipe = Equipe::find($id);
        $continents = Continent::all();
        return view('pages.edit_equipes', compact('equipe', 'continents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_equipe = Equipe::find($id);
        $update_equipe->update([
            'nom_equipe' => $request -> nom,
            'ville' => $request -> ville,
            'pays' => $request -> pays,
            'nb_joueurs_max' => $request -> joueurs,
            'continent_id' => $request -> continent,
        ]);

        return redirect('/equipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipe::find($id)-> delete();
        return redirect()->back();
    }
}
