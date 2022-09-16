<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Photo;
use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JoueursControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueurs = Joueur::all();
        $roles = Role::all();
        $equipes = Equipe::all();
        return view('pages.joueurs', compact('joueurs', 'roles', 'equipes'));
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
        Storage::put('public/photos', $request->file('photo'));

        $photo= new Photo();
        $photo-> photo_path = $request->file('photo')->hashName();
        $photo->save();

        Joueur::create([
            'nom_joueur' => $request->nom,
            'prenom_joueur' => $request->prenom,
            'age' => $request->age,
            'telephone' => $request->telephone,
            'mail' => $request->mail,
            'genre' => $request->genre,
            'pays_origine' => $request->pays,
            'role_id' => $request->role,
            'equipe_id' => $request->equipe,
            'photo_id' => $photo->id,
        ]);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_joueur = Joueur::find($id);

        Storage::delete('public/photos/' . $delete_joueur -> photo -> photo_path);

        $delete_joueur -> photo() -> delete();

        return redirect()->back();
    }
}
