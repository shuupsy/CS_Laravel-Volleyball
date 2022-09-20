@extends('layouts.index')

@section('content')
<section class='flex justify-center'>
    <div class='w-3/4 bg-[#f8f7ff]/[.36] border-2 border-slate-500 rounded-lg shadow-lg p-6 flex flex-col items-center justify-center gap-10'>
            {{-- Titre --}}
            <div class='flex gap-3 items-center'>
                <a href="/equipes" class='text-slate-500 hover:text-black'>
                    <i class='bx bx-subdirectory-left bx-md'></i>
                </a>

                <h1 class='text-5xl'>Modifier : {{ $equipe -> nom_equipe }}</h1>
            </div>

            {{-- Formulaire --}}
            <form action="{{ url('/equipes' . '/'. $equipe -> id)}}" method='post' class='flex flex-col gap-3' id='edit_team_form'>
                @csrf
                @method('PATCH')

                <div class='flex items-center gap-3.5'>
                    <label for="nom">Nom de l'équipe: </label>
                    <input type="text" name="nom" id="nom" value='{{ $equipe -> nom_equipe }}' placeholder="Nom de l'équipe" class='mb-2 p-0.5 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>
                </div>

                <div class='flex items-center gap-3.5'>
                    <label for="ville">Ville: </label>
                    <input type="text" name="ville" id="ville" value='{{ $equipe -> ville }}' placeholder="Ville" class='mb-2 p-0.5 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>
                </div>

                <div class='flex items-center gap-3.5'>
                    <label for="pays">Pays: </label>
                    <input type="texte" name="pays" id="pays" value='{{ $equipe -> pays }}' placeholder="Pays" class='mb-2 p-0.5 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>
                </div>

                <div class='my-3'>
                    @foreach ($continents as $continent)
                        <label>
                            <input class='hidden' type="radio" name="continent" value="{{ $continent->id }}" {{ $continent->nom_continent == $equipe->continent->nom_continent ? 'checked="checked"' : ''}}>
                            <span
                                class='w-20 p-2 rounded-lg cursor-pointer '>{{ $continent->nom_continent }}</span>
                        </label>
                    @endforeach
                </div>


                <div>
                    <label for="joueurs">Nombre de joueurs max: </label>
                    <input type="number" name="joueurs" id="joueurs" value='9' min='9' max='9'>
                </div>

                <div class='flex justify-center items-center gap-5 mt-5'>
                    <button type='submit'
                        class='bg-[#b8b8ff] hover:bg-[#9381ff] text-white rounded-lg px-4 py-2'>ENVOYER</button>
                    <a href="/equipes"><p class='cursor-pointer text-slate-600 hover:border-[1px] hover:rounded-lg hover:border-slate-600 px-4 py-2'
                        id='close_player_form'>Cancel</p></a>
                </div>
            </form>
    </div>
</section>

@endsection
