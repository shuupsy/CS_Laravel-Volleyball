@extends('layouts.index')

@section('content')
    <section class='flex justify-center'>
        <div
            class='relative w-3/4 bg-[#f8f7ff]/[.36] border-2 border-slate-500 rounded-lg shadow-lg p-6 flex items-center justify-center gap-10'>

            {{-- Menu gauche --}}
            <div class='flex flex-col gap-5'>
                {{-- Bouton EDIT --}}
                <a href="{{ url('joueurs/' . $joueur->id . '/edit') }}" class='absolute top-4 right-4'>
                    <button class='bg-slate-500 text-white hover:bg-slate-300 hover:text-black rounded-lg p-2'>EDIT</button>
                </a>

                {{-- Titre --}}
                <div class='flex gap-3 items-center'>
                    <a href="/joueurs" class='text-slate-500 hover:text-black'>
                        <i class='bx bx-subdirectory-left bx-md'></i>
                    </a>
                    <h1 class='text-4xl'>{{ $joueur->prenom_joueur . ' ' . $joueur->nom_joueur }}</h1>
                </div>

                <div class='flex gap-3 items-center text-xl'>
                    <h2 class='uppercase text-[#a34100]'>{{ $joueur->role->role }}</h2>
                    <p>|</p>
                    <h2 class='text-[#cc5200]'>{{ $joueur->equipe_id ? $joueur->equipe->nom_equipe : 'sans équipe' }}</span>
                    </h2>

                    @if ($joueur->equipe_id != null)
                        <a href="{{ url('equipes/' . $joueur->equipe->id) }}"> <button
                                class='bg-blue-200 hover:bg-[#8ecae6] text-black text-xs rounded-lg p-1'>INFO</button></a>
                    @endif

                </div>

                </h2>

                {{-- Informations personnelles joueur --}}
                <div class='flex flex-col gap-2'>
                    <p>
                        {{ $joueur->age }} ans

                        @switch($joueur->genre)
                            @case('F')
                                (<i class='bx bx-female-sign bx-sm'></i>)
                            @break

                            @case('H')
                                (<i class='bx bx-male-sign bx-sm'></i>)
                            @break

                            @default
                        @endswitch
                    </p>
                    <p>
                        <i class='bx bx-phone bx-sm'></i> :
                        {{ $joueur->telephone }}
                    </p>
                    <p><i class='bx bx-envelope bx-sm'></i> :
                        {{ $joueur->mail }}
                    </p>
                    <p>
                        <i class='bx bx-map bx-sm'></i> :
                        {{ $joueur->pays_origine }}
                    </p>
                </div>
            </div>


            <div>
                @if ($joueur->photo_id != null)
                    <img src="{{ asset('storage/photos/' . $joueur->photo->photo_path) }}" alt="photo joueur"
                        class='w-44 h-44 object-cover rounded-full border-2 border-slate-600'>
                @endif
            </div>

        </div>
    </section>
@endsection
