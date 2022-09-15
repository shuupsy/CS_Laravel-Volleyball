@extends('layouts.index')

@section('content')
    <section>
        {{-- Form --}}
        <div>
            <h1 class='text-5xl'>Ajouter une nouvelle équipe !</h1>
            <form action="/equipes" method='post'>
                @csrf

                <div>
                    <label for="nom">Nom de l'équipe: </label>
                    <input type="text" name="nom" id="nom" value='{{ old('nom') }}'>
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
                    <input type="texte" name="pays" id="pays" value='{{ old('pays') }}'>
                </div>

                <div>
                    <label for="ville">Ville: </label>
                    <input type="text" name="ville" id="ville" value='{{ old('ville') }}'>
                </div>


                <div>
                    <label for="joueurs">Nombre de joueurs max: </label>
                    <input type="number" name="joueurs" id="joueurs" value='6' min='1' max='6' value='{{ old('joueurs') }}'>
                </div>


                <button type='submit' class='bg-green-400 rounded-lg p-2'>ENVOYER</button>
            </form>
        </div>

        {{-- Liste d'équipes --}}
        <div>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom de l'équipe</th>
                        <th>Ville</th>
                        <th>Joueurs max</th>
                        <th>Détails</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($equipes as $equipe)
                        <tr>
                            <td>{{ $equipe->id }}</td>
                            <td>{{ $equipe->nom_equipe }}</td>
                            <td>{{ $equipe->ville }}</td>
                            <td class='text-center'>{{ $equipe->nb_joueurs_max }}</td>

                            {{-- Bouton VOIR --}}
                            <td>
                                <a href="{{ url('equipes/' . $equipe->id) }}"> <button class='bg-blue-200 rounded-lg p-2'>INFO</button></a>
                            </td>

                            <td>
                                <a href="{{ url('equipes/' . $equipe->id . '/edit') }}"> <button class='bg-slate-500 text-white rounded-lg p-2'>EDIT</button></a>
                            </td>

                            {{-- Bouton DELETE --}}
                            <td>
                                <form action="{{ url('album/' . $equipe->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class='bg-red-500 rounded-lg p-2'>SUPPRIMER</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>
@endsection
