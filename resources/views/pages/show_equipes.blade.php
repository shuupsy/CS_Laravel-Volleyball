@extends('layouts.index')

@section('content')
    <div>
        <h1 class='text-5xl'>Fiche équipe</h1>

        <h2 class='text-xl'>{{ $equipe -> nom_equipe }}</h2>

        <p>Ville : {{ $equipe -> ville }}</p>
        <p>Pays : {{ $equipe -> pays }}</p>
        <p>Continent : {{ $equipe -> continent -> nom_continent }}</p>

        <p>Joueurs max : {{ $equipe -> nb_joueurs_max }}</p>
        <p>Liste de joueurs :</p>
        <ul>
            @foreach ($joueurs_equipe as $joueur)
                <li>{{ $joueur -> nom_joueur }}</li>
            @endforeach
        </ul>
    </div>
@endsection
