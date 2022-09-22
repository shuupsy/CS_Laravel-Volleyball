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
        $equipes = Equipe::withCount('joueurs')->get();
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
        $equipes =
        /* Validation */
       request()->validate([
            "nom" => "required|min:1|max:50",
            "prenom" => "required|min:1|max:50",
            "age" => "required|min:1|max:60",
            "telephone" => "required|size:12",
            "mail" => "required|min:1|max:300",
            "genre" => "required|min:1|max:300",
            "pays" => "required|min:1|max:300",
            "image" => "mimes:jpg,png,jpeg",
             ]);

        /* Fin validation */

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
        $joueur = Joueur::find($id);
        return view('pages.show_joueur', compact('joueur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $joueur = Joueur::find($id);
       $equipes = Equipe::withCount('joueurs')->get();
       $roles = Role::all();
       return view('pages.edit_joueurs', compact('joueur', 'equipes', 'roles'));
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
        $update_photo = Photo::find($id);

        $update_joueur = Joueur::find($id);
        $update_joueur -> nom_joueur = $request->nom;
        $update_joueur -> prenom_joueur = $request->prenom;
        $update_joueur -> age = $request->age;
        $update_joueur -> telephone = $request->telephone;
        $update_joueur -> mail = $request->mail;
        $update_joueur -> genre = $request->genre;
        $update_joueur -> pays_origine = $request->pays;
        $update_joueur -> role_id = $request->role;
        $update_joueur -> equipe_id = $request->equipe;

        if ($request->file('photo') != null) {
            Storage::delete('public/photos/' . $update_joueur->photo->photo_path);

            Storage::put('public/photos/', $request->file('photo'));

            $update_photo->photo_path = $request->file('photo')->hashName();
            $update_photo->save();
            $update_joueur -> photo_id = $update_photo -> id;
        }

       $update_joueur->save();

        return redirect('/joueurs');
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
