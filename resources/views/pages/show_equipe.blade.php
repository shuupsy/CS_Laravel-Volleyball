@extends('layouts.index')

@section('content')
    <section class='flex justify-center'>
        <div
            class='relative w-2/3 bg-[#f8f7ff]/[.36] border-2 border-slate-500 rounded-lg shadow-lg p-6 flex flex-col justify-center gap-5' id='europe'>

            {{-- Titre --}}
            <div class='flex gap-3 items-center'>
                <a href="/equipes" class='text-slate-500 hover:text-black'>
                    <i class='bx bx-subdirectory-left bx-md'></i>
                </a>

                <h1 class='text-5xl'>Equipe - {{ $equipe->nom_equipe }}</h1>

                <a href="{{ url('equipes/' . $equipe->id . '/edit') }}" class='absolute top-4 right-4'>
                    <button class='bg-slate-500 text-white hover:bg-slate-300 hover:text-black rounded-lg p-2'>EDIT</button>
                </a>
            </div>

            <h2 class='text-xl'>{{ $equipe->ville }}, {{ $equipe->pays }}.</h2>

            {{-- Contenu --}}
            <div class='flex flex-col gap-2'>

               {{--  <p>Continent : {{ $equipe->continent->nom_continent }}</p> --}}

                <p class='text-lg'>Joueurs ( {{ $equipe->joueurs_count }} / {{ $equipe->nb_joueurs_max }} max )</p>
                <ul>
                    @foreach ($joueurs_equipe as $joueur)
                        <li>{{ $joueur->nom_joueur }}, {{ $joueur->prenom_joueur }}, {{ $joueur->role->role }}
                            <a href="{{ url('joueurs/' . $joueur->id) }}">
                                <button class='bg-blue-200 hover:bg-[#8ecae6] text-black text-xs rounded-lg p-1'>INFO</button>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>


        </div>
    </section>
@endsection
