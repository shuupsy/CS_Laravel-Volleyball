@extends('layouts.index')

@section('content')
<div>
    <h1 class='text-5xl'>Editer {{ $joueur -> prenom_joueur . ' ' . $joueur -> nom_joueur }} !</h1>
    <form action="{{ url('/joueurs' . '/'. $joueur -> id)}}"
        method='post'
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div>
            <label for="nom">Nom du joueur: </label>
            <input type="text" name="nom" id="nom" value='{{ $joueur -> nom_joueur  }}'>
        </div>

        <div>
            <label for="prenom">Prénom du joueur: </label>
            <input type='text' name="prenom" id="prenom" value='{{ $joueur -> prenom_joueur }}'>
        </div>

        <div>
            <label for="age">Age: </label>
            <input type="number" name="age" id="age" value='{{ $joueur -> age }}' min='5'
                max='90'>
        </div>

        <div>
            <label for="telephone">Téléphone: </label>
            <input type="text" name="telephone" id="telephone" value='{{ $joueur -> telephone }}'>
        </div>

        <div>
            <label for="mail">Mail: </label>
            <input type="text" name="mail" id="mail" value='{{ $joueur -> mail }}'>
        </div>

        <div>
            <label for="genre">Genre: </label>
            <select name="genre" id="genre">
                <option value="F">Femme</option>
                <option value="H">Homme</option>
                <option value="X">Autre</option>
            </select>
        </div>

        <div>
            <label for="pays">Pays d'origine: </label>
            <input type="text" name="pays" id="pays" value='{{ $joueur -> pays_origine }}'>
        </div>

        <div>
            <label for="equipe">Equipe : </label>
            <select name="equipe" id="equipe">
                @foreach ($equipes as $equipe)
                    <option value="{{ $equipe->id }}">{{ $equipe->nom_equipe }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="role">Rôle: </label>
            <select name="role" id="role">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                @endforeach
            </select>
        </div>


        <div>
            <label for="photo">Photo du joueur :</label>
            <input type="file" name='photo' id='photo'>
        </div>


        <button type='submit' class='bg-green-400 rounded-lg p-2'>ENVOYER</button>
    </form>
</div>
@endsection
