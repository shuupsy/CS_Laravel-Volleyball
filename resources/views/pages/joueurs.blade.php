@extends('layouts.index')

@section('content')
    <section>

        {{-- Banner --}}
        <div class='relative flex justify-center'>
            <img src="assets/img/image-banner2.png" alt="banner">

            <div class='absolute bottom-2 right-0 flex gap-4'>
                <button class='bg-[#67CCC4] hover:bg-[#7de2d1] rounded-lg p-2' id='new_player'>NEW</button>
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
                                        class='bg-blue-200 hover:bg-[#8ecae6] rounded-lg p-2'>INFO</button></a>
                            </td>

                            <td>
                                <a href="{{ url('joueurs/' . $joueur->id . '/edit') }}"> <button
                                        class='bg-slate-500 hover:bg-slate-300 hover:text-black text-white rounded-lg p-2'>EDIT</button></a>
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
                <div class='w-2/4 bg-white shadow-lg rounded-lg flex flex-col justify-between items-center p-6 gap-6'>

                    <h1 class='text-5xl'>Ajouter un nouveau joueur !</h1>

                    <div class='flex flex-wrap items-center gap-6'>
                        <input type="text" name="nom" id="nom" value='{{ old('nom') }}'
                            placeholder="Nom du joueur"
                            class='mb-3 p-2 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>

                        <input type='text' name="prenom" id="prenom" value='{{ old('prenom') }}'
                            placeholder="Prénom du joueur"
                            class='mb-3 p-2 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>


                        <input type="number" name="age" id="age" value='{{ old('age') }}' min='16'
                            max='50' placeholder="Age"
                            class='w-16 mb-3 p-2 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>

                        <div>
                            {{-- <label for="genre">Genre: </label> --}}
                            <select name="genre" id="genre"
                                class='p-1.5 border-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383]'>
                                <option value="F">Femme</option>
                                <option value="H">Homme</option>
                                <option value="">Non défini</option>
                            </select>
                        </div>


                        <input type="text" name="telephone" id="telephone" value='{{ old('telephone') }}'
                            placeholder="Telephone"
                            class='mb-3 p-2 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>


                        <input type="text" name="mail" id="mail" value='{{ old('mail') }}'
                            placeholder="E-mail"
                            class='mb-3 p-2 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>


                        <input type="text" name="pays" id="pays" value='{{ old('pays') }}'
                            placeholder="Pays d'origine" class='mb-3 p-2 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>

                        <div>
                            <label for="equipe">Équipe : </label>
                            <select name="equipe" id="equipe" class='p-1.5 border-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383]'>
                                <option value="">    </option>
                                @foreach ($equipes as $equipe)
                                    <option value="{{ $equipe->id }}">{{ $equipe->nom_equipe }}</option>
                                @endforeach
                            </select>
                        </div>

                        <diV class='flex gap-2'>
                            <label for="role">Rôle: </label>
                                @foreach ($roles as $role)
                                    <label>
                                        <input class='hidden' type="radio" name="role" value="{{ $role->id }}">
                                        <span class='w-20 p-2 rounded-lg cursor-pointer '>{{ $role->role }}</span>
                                    </label>
                                @endforeach
                        </diV>

                        <div>
                            <label for="photo">Photo :</label>
                            <input type="file" name='photo' id='photo' class='text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-[#fcf3ee] file:text-[#cc5200]
                            hover:file:bg-[#ffd8be] hover:file:text-[#8f3900]'>
                        </div>
                    </div>

                    <div class='flex justify-center items-center gap-5'>
                        <button type='submit'
                            class='bg-[#b8b8ff] hover:bg-[#9381ff] text-white rounded-lg px-4 py-2'>ENVOYER</button>
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
