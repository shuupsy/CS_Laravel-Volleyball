@extends('layouts.index')

@section('content')
    <section class='flex justify-center'>
        <div class='w-3/4 bg-[#f8f7ff]/[.36] border-2 border-slate-500 rounded-lg shadow-lg p-6 flex flex-col items-center justify-center gap-10'>

                <div class='flex gap-3 items-center'>
                    <a href="/joueurs" class='text-slate-500 hover:text-black'>
                        <i class='bx bx-subdirectory-left bx-md'></i>
                    </a>

                    <h1 class='text-5xl'>Editer {{ $joueur->prenom_joueur . ' ' . $joueur->nom_joueur }} !</h1>
                </div>


                <form action="{{ url('/joueurs' . '/' . $joueur->id) }}" method='post' enctype="multipart/form-data" id='edit_player_form' class='flex flex-col gap-3'>
                    @csrf
                    @method('PATCH')

                    <div class='flex items-center gap-3.5'>
                        <label for="nom">Nom du joueur: </label>
                        <input type="text" name="nom" id="nom" value='{{ $joueur->nom_joueur }}' placeholder="Nom du joueur" class='mb-2 p-0.5 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>
                    </div>

                    <div class='flex items-center gap-3'>
                        <label for="prenom">Prénom du joueur: </label>
                        <input type='text' name="prenom" id="prenom" value='{{ $joueur->prenom_joueur }}' placeholder="Prénom du joueur" class='mb-2 p-0.5 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>
                    </div>

                    <div class='flex items-center gap-3'>
                        <label for="age">Age: </label>
                        <input type="number" name="age" id="age" value='{{ $joueur->age }}' min='16'
                            max='50' placeholder="Age"
                            class='w-16 mb-3 p-0.5 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300' >
                    </div>

                    <div class='flex items-center gap-3'>
                        <label for="telephone">Téléphone: </label>
                        <input type="text" name="telephone" id="telephone" value='{{ $joueur->telephone }}' placeholder="Telephone"
                        class='mb-3 p-0.5 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>
                    </div>

                    <div class='flex items-center gap-3'>
                        <label for="mail">Mail: </label>
                        <input type="text" name="mail" id="mail" value='{{ $joueur->mail }}' placeholder="E-mail"
                        class='mb-3 p-0.5 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>
                    </div>

                    <div class='flex items-center gap-3'>
                        <label for="genre">Genre: </label>
                        <select name="genre" id="genre" class='p-1.5 border-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383]'>
                            <option value="F">Femme</option>
                            <option value="H">Homme</option>
                            <option value="">Non défini</option>
                        </select>
                    </div>

                    <div class='flex items-center gap-3'>
                        <label for="pays">Pays d'origine: </label>
                        <input type="text" name="pays" id="pays" value='{{ $joueur->pays_origine }}' placeholder="Pays d'origine" class='mb-3 p-0.5 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>
                    </div>

                    <div class='flex items-center gap-3'>
                        <label for="equipe">Equipe : </label>
                        <select name="equipe" id="equipe" class='p-1.5 border-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383]'>
                            <option value="">    </option>
                            @foreach ($equipes as $equipe)
                                <option value="{{ $equipe->id }}">{{ $equipe->nom_equipe }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class='flex items-center gap-3 my-2'>
                        <label for="role">Rôle: </label>
                            @foreach ($roles as $role)
                            <label>
                                <input class='hidden' type="radio" name="role" value="{{ $role->id }}">
                                <span class='w-20 p-2 rounded-lg cursor-pointer '>{{ $role->role }}</span>
                            </label>
                            @endforeach
                    </div>


                    <div class='flex items-center gap-3 my-2'>
                        <label for="photo">Photo :</label>
                            <input type="file" name='photo' id='photo' class='text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-[#fcf3ee] file:text-[#cc5200]
                            hover:file:bg-[#ffd8be] hover:file:text-[#8f3900]'>

                        @if ($joueur->photo_id != null)
                            <img src="{{ asset('storage/photos/' . $joueur->photo->photo_path) }}" alt="photo joueur"
                                class='w-12 h-8 object-cover'>
                        @endif
                    </div>


                    <div class='flex justify-center items-center gap-5'>
                        <button type='submit'
                            class='bg-[#b8b8ff] hover:bg-[#9381ff] text-white rounded-lg px-4 py-2'>ENVOYER</button>
                        <p class='cursor-pointer text-slate-600 hover:border-[1px] hover:rounded-lg hover:border-slate-600 px-4 py-2'
                            id='close_player_form'>Cancel</p>
                    </div>

                </form>
            </div>

    </section>
@endsection
