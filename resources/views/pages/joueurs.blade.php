@extends('layouts.index')

@section('content')
    <section>

        {{-- Banner --}}
        <div class='relative flex justify-center'>
            <img src="assets/img/image-banner2.png" alt="banner">

            <div class='absolute bottom-2 right-0 flex gap-4'>
                <button class='bg-[#67CCC4] rounded-lg p-2' id='new_player'>NEW</button>
            </div>
        </div>

        {{-- Liste de joueurs --}}
        <div class='flex justify-center'>
            <table class="table-auto w-full">
                <thead class='bg-[#b8b8ff] h-14'>
                    <tr>
                        <th class='px-5'>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Equipe</th>
                        <th>Détails</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody class='bg-[#ffeedd]/[.26]'>
                    @foreach ($joueurs as $joueur)
                        <tr class='h-14'>
                            <td class='text-center'>{{ $joueur->id }}</td>
                            <td class='px-10'>{{ $joueur->nom_joueur }}</td>
                            <td class='px-10'>{{ $joueur->prenom_joueur }}</td>

                            <td class='px-10'>{{ $joueur->equipe_id ? $joueur->equipe->nom_equipe : '' }}</td>

                            {{-- Bouton VOIR --}}
                            <td>
                                <a href="{{ url('joueurs/' . $joueur->id) }}"> <button
                                        class='bg-blue-200 rounded-lg p-2'>INFO</button></a>
                            </td>

                            <td>
                                <a href="{{ url('joueurs/' . $joueur->id . '/edit') }}"> <button
                                        class='bg-slate-500 text-white rounded-lg p-2'>EDIT</button></a>
                            </td>

                            {{-- Bouton DELETE --}}
                            <td>
                                <form action="{{ url('joueurs/' . $joueur->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button
                                        class='text-red-500 hover:bg-red-500 hover:text-white hover:rounded-lg p-2'>Retirer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{-- Form --}}
        <form action="/joueurs" method='post' enctype="multipart/form-data" class='hidden' id='player_form'>
            @csrf

            <div class='fixed top-0 left-0 w-screen h-screen bg-slate-600/50 flex justify-center items-center'>
                <div class='w-2/4 bg-white shadow-lg rounded-lg flex flex-col justify-between p-6 gap-5'>
                    <h1 class='text-5xl'>Ajouter un nouveau joueur !</h1>

                    <div>
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
                            <input type="number" name="age" id="age" value='{{ old('age') }}' min='16'
                                max='50'>
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
                                <option value="">Non défini</option>
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
                                    <option value="{{ $role->id }}">{{ $role->role }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="equipe">Ajouter à l'équipe : </label>
                            <select name="equipe" id="equipe">
                                <option value=""> </option>
                                @foreach ($equipes as $equipe)
                                    <option value="{{ $equipe->id }}">{{ $equipe->nom_equipe }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="photo">Photo du joueur :</label>
                            <input type="file" name='photo' id='photo'>
                        </div>
                    </div>

                    <div class='flex justify-center items-center gap-5'>
                        <button type='submit' class='bg-blue-500 text-white rounded-lg px-4 py-2'>ENVOYER</button>
                        <p class='cursor-pointer text-slate-600 hover:border-[1px] hover:rounded-lg hover:border-slate-600 px-4 py-2'
                            id='close_player_form'>Cancel</p>
                    </div>
                </div>
            </div>

        </form>
    </section>
@endsection

@section('js')
    <script src='/assets/js/player.js'></script>
@endsection
