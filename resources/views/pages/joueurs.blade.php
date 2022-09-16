@extends('layouts.index')

@section('content')
<section>
    <div>
        {{-- Form --}}
        <div>
            <h1 class='text-5xl'>Ajouter un nouveau joueur !</h1>
            <form action="/joueurs" method='post' enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="nom">Nom du joueur: </label>
                    <input type="text" name="nom" id="nom" value='{{ old('nom') }}'>
                </div>

                <div>
                    <label for="prenom">Prénom du joueur: </label>
                    <input type='text' name="prenom" id="prenom" value='{{ old('prenom') }}'>
                </div>

                <div>
                    <label for="age">Age: </label>
                    <input type="number" name="age" id="age" value='{{ old('age') }}' min='5' max='90'>
                </div>

                <div>
                    <label for="telephone">Téléphone: </label>
                    <input type="text" name="telephone" id="telephone" value='{{ old('telephone') }}'>
                </div>

                <div>
                    <label for="mail">Mail: </label>
                    <input type="text" name="mail" id="mail" value='{{ old('mail') }}'>
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
                    <input type="text" name="pays" id="pays" value='{{ old('pays') }}'>
                </div>

                <div>
                    <label for="role">Rôle: </label>
                    <select name="role" id="role">
                        @foreach ($roles as $role)
                            <option value="{{ $role -> id }}">{{ $role -> role }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="equipe">Ajouter à l'équipe : </label>
                    <select name="equipe" id="equipe">
                        @foreach ($equipes as $equipe)
                            <option value="{{ $role -> id }}">{{ $equipe -> nom_equipe }}</option>
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

        {{-- Liste d'équipes --}}
        <div>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Equipe</th>
                        <th>Détails</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($joueurs as $joueur)
                        <tr>
                            <td>{{ $joueur-> id }}</td>
                            <td>{{ $joueur-> nom_joueur }}</td>
                            <td>{{ $joueur-> prenom_joueur}}</td>
                            <td>{{ $joueur-> equipe -> nom_equipe}}</td>

                            {{-- Bouton VOIR --}}
                            <td>
                                <a href="{{ url('equipes/' . $joueur->id) }}"> <button class='bg-blue-200 rounded-lg p-2'>INFO</button></a>
                            </td>

                            <td>
                                <a href="{{ url('equipes/' . $joueur->id . '/edit') }}"> <button class='bg-slate-500 text-white rounded-lg p-2'>EDIT</button></a>
                            </td>

                            {{-- Bouton DELETE --}}
                            <td>
                                <form action="{{ url('equipes/' . $joueur->id) }}" method="post">
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
    </div>
</section>
@endsection
