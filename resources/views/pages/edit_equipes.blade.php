@extends('layouts.index')

@section('content')

<div>
    <h1 class='text-5xl'>Modifier l'équipe : {{ $equipe -> nom_equipe }}</h1>
    <form action="{{ url('/equipes' . '/'. $equipe -> id)}}" method='post'>
        @csrf
        @method('PUT')

        <div>
            <label for="nom">Nom de l'équipe: </label>
            <input type="text" name="nom" id="nom" value='{{ $equipe -> nom_equipe }}'>
        </div>

        <div>
            <label for="continent">Continent: </label>
            <select name="continent" id="continent">
                @foreach ($continents as $continent)
                    <option value="{{ $continent -> id }}">{{ $continent -> nom_continent }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="pays">Pays: </label>
            <input type="texte" name="pays" id="pays" value='{{ $equipe -> pays }}'>
        </div>

        <div>
            <label for="ville">Ville: </label>
            <input type="text" name="ville" id="ville" value='{{ $equipe -> ville }}'>
        </div>

        <div>
            <label for="joueurs">Nombre de joueurs max: </label>
            <input type="number" name="joueurs" id="joueurs" value='6' min='1' max='6'>
        </div>

        <button type='submit' class='bg-green-400 rounded-lg p-2'>METTRE À JOUR</button>
    </form>
</div>

@endsection
