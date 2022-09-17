@extends('layouts.index')

@section('content')
<div>
    <h1 class='text-5xl'>Fiche joueur</h1>

    <a href="{{ url('joueurs/' . $joueur->id . '/edit') }}"> <button
        class='bg-slate-500 text-white rounded-lg p-2'>EDIT</button></a>

    <h2 class='text-2xl'>{{ $joueur -> prenom_joueur  . ' ' . $joueur -> nom_joueur }}</h2>

    <p>Age : {{ $joueur -> age }}</p>
    <p>Genre : {{ $joueur -> genre }}</p>
    <p>Téléphone : {{ $joueur -> telephone }}</p>
    <p>Mail : {{ $joueur -> mail }}</p>
    <p>Pays d'origine : {{ $joueur -> pays_origine }}</p>

    <p>Equipe : {{ $joueur -> equipe -> nom_equipe }}</p>
    <p>Rôle : {{ $joueur -> role -> role }}</p>
    <img src="{{ asset('storage/photos/' . $joueur -> photo -> photo_path) }}" alt="photo joueur">
</div>
@endsection
