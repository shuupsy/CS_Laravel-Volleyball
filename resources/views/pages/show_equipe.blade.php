@extends('layouts.index')

@section('content')
    <div>
        <h1 class='text-5xl'>Fiche équipe</h1>
        
        <a href="{{ url('equipes/' . $equipe->id . '/edit') }}"> <button class='bg-slate-500 text-white rounded-lg p-2'>EDIT</button></a>

        <h2 class='text-xl'>{{ $equipe -> nom_equipe }}</h2>

        <p>Ville : {{ $equipe -> ville }}</p>
        <p>Pays : {{ $equipe -> pays }}</p>
        <p>Continent : {{ $equipe -> continent -> nom_continent }}</p>

        <p>Joueurs max : </p>
        <p>Liste de joueurs ( {{ $equipe -> joueurs_count }} / {{ $equipe -> nb_joueurs_max }} max )</p>
        <ul>
            @foreach ($joueurs_equipe as $joueur)
                <li>{{ $joueur -> nom_joueur }}, {{ $joueur -> prenom_joueur }}, {{ $joueur -> role -> role }}
                <a href="{{ url('joueurs/' . $joueur->id) }}">
                    <button class='bg-blue-200 rounded-lg p-2'>VOIR</button>
                </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
