@extends('layouts.index')

@section('content')
    <section class='flex flex-col gap-10'>
        <div>
            <h1 class='text-4xl'>Équipes remplies ({{ count($full_team) }})</h1>
            <div class='gtc'>
                @foreach ($full_team as $team)
                    <a href="/equipes/{{ $team->id }}">
                        <div
                            class='pays {{ $team->continent->nom_continent }} h-40 border-2 border-slate-500 hover:border-4 hover:border-slate-700 rounded-lg shadow-lg p-6'>

                            <h1 class='text-5xl'>{{ $team->nom_equipe }}</h1>
                            <h2 class='text-xl'>{{ $team->ville }}, {{ $team->pays }}.</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div>
            <h1 class='text-4xl'>Équipes NON remplies</h1>
            <div class='gtc'>
                @foreach ($nonfull_team as $team)
                    <a href="/equipes/{{ $team->id }}">
                        <div
                            class='pays {{ $team->continent->nom_continent }} h-40 border-2 border-slate-500 hover:border-4 hover:border-slate-700 rounded-lg shadow-lg p-6'>

                            <h1 class='text-5xl'>{{ $team->nom_equipe }}</h1>
                            <h2 class='text-xl'>{{ $team->ville }}, {{ $team->pays }}.</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Joueurs sans équipes --}}
        <div class='flex flex-col gap-2'>
            <h1 class='text-4xl'>Joueurs SANS équipe</h1>
            <div class='gtc-player'>
                @foreach ($noteam_player as $player)
                <a href="/joueurs/{{ $player->id }}">
                         <div
                             class='h-40 border-2 border-slate-500 hover:border-4 hover:border-slate-700 rounded-lg shadow-lg p-6 flex justify-between items-center'>

                             <div>
                                 <h1 class='text-2xl font-bold'>{{ $player->prenom_joueur }} <span
                                         class='uppercase'>{{ $player->nom_joueur }}</span></h1>

                                 <h2 class='text-[#cc5200] text-xl uppercase'>{{ $player->role->role }}</h2>
                             </div>

                             <div>
                                 @if ($player->photo_id != null)
                                     <img src="{{ asset('storage/photos/' . $player->photo->photo_path) }}"
                                         alt="photo joueur"
                                         class='w-32 h-32 object-cover rounded-full border-2 border-slate-600'>
                                 @else
                                     <img src="/assets/img/default-avatar.png" alt="photo default joueur"
                                         class='w-32 h-32 object-cover rounded-full border-2 border-slate-600'>
                                 @endif
                             </div>
                         </div>
                     </a>
             @endforeach
            </div>
        </div>

        {{-- Joueurs AVEC équipes --}}
        <div class='flex flex-col gap-2'>
            <h1 class='text-4xl'>Joueurs AVEC équipe</h1>
            <div class='gtc-player'>
                @foreach ($withteam_player as $player)
                    <a href="/joueurs/{{ $player->id }}">
                        <div
                            class='h-40 border-2 border-slate-500 hover:border-4 hover:border-slate-700 rounded-lg shadow-lg p-6 flex justify-between items-center'>

                            <div>
                                <h1 class='text-2xl font-bold'>{{ $player->prenom_joueur }} <span
                                        class='uppercase'>{{ $player->nom_joueur }}</span></h1>

                                <h2 class='text-[#cc5200] text-xl'>
                                    {{ $player->equipe->nom_equipe }} - <span class='uppercase'>{{ $player->role->role }}</span>
                                </h2>
                            </div>

                            <div>
                                @if ($player->photo_id != null)
                                    <img src="{{ asset('storage/photos/' . $player->photo->photo_path) }}"
                                        alt="photo joueur"
                                        class='w-32 h-32 object-cover rounded-full border-2 border-slate-600'>
                                @else
                                    <img src="/assets/img/default-avatar.png" alt="photo default joueur"
                                        class='w-32 h-32 object-cover rounded-full border-2 border-slate-600'>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>


        {{-- Equipes d'Europe --}}
        <div class='flex flex-col gap-2'>
            <h1 class='text-4xl'>Équipes d'Europe ({{ count($europe_team) }})</h1>

            <div class='gtc'>
                @foreach ($europe_team as $team)
                    <a href="/equipes/{{ $team->id }}">
                        <div
                            class='pays {{ $team->continent->nom_continent }} h-40 border-2 border-slate-500 hover:border-4 hover:border-slate-700 rounded-lg shadow-lg p-6'>

                            <h1 class='text-5xl'>{{ $team->nom_equipe }}</h1>
                            <h2 class='text-xl'>{{ $team->ville }}, {{ $team->pays }}.</h2>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Equipes HORS Europe --}}
        <div class='flex flex-col gap-2'>
            <h1 class='text-4xl'>Équipes HORS Europe ({{ count($outside_team) }})</h1>

            <div class='gtc'>
                @foreach ($outside_team as $team)
                    <a href="/equipes/{{ $team->id }}">
                        <div
                            class='pays {{ $team->continent->nom_continent }} h-40 border-2 border-slate-500 hover:border-4 hover:border-slate-700 rounded-lg shadow-lg p-6'>

                            <h1 class='text-5xl'>{{ $team->nom_equipe }}</h1>
                            <h2 class='text-xl'>{{ $team->ville }}, {{ $team->pays }}.</h2>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </section>

    {{-- <section>
        <h1 class='text-4xl'>Joueuses, avec équipe</h1>
        @foreach ($withteam_female as $player)
            <ul>
                <li>{{ $player -> nom_joueur }}</li>
            </ul>
        @endforeach
    </section>

    <section>
        <h1 class='text-4xl'>Joueurs, avec équipe</h1>
        @foreach ($withteam_male as $player)
            <ul>
                <li>{{ $player -> nom_joueur }}</li>
            </ul>
        @endforeach
    </section> --}}


    {{-- <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
        <div class="w-full relative flex items-center justify-center">
            <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev">
                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                <div id="slider" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 1</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/DWrGxX6/carosel-2.png" alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/tCfVky2/carosel-3.png" alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/rFsGfr5/carosel-4.png" alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/DWrGxX6/carosel-2.png" alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/tCfVky2/carosel-3.png" alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/rFsGfr5/carosel-4.png" alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/fDngH9G/carosel-1.png" alt="black chair and white table" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/DWrGxX6/carosel-2.png" alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/tCfVky2/carosel-3.png" alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 relative w-full sm:w-auto">
                        <img src="https://i.ibb.co/rFsGfr5/carosel-4.png" alt="sitting area" class="object-cover object-center w-full" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Catalog 2</h2>
                            <div class="flex h-full items-end pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900">Minimal Interior</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button aria-label="slide forward" class="absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="next">
                <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div> --}}
@endsection

@section('js')
    <script src="/assets/js/show_team.js"></script>
@endsection
