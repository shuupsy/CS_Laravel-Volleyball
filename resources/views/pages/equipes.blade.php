@extends('layouts.index')

@section('content')
    <section>
        {{-- Banner --}}
        <div class='relative flex justify-center'>
            <img src="assets/img/image-banner2.png" alt="banner">

            <div class='absolute bottom-2 right-0 flex gap-4'>
                <button class='bg-[#67CCC4] rounded-lg p-2' id='new_team'>NEW</button>
            </div>
        </div>


        {{-- Liste d'équipes --}}
        <div class='flex justify-center'>
            <table class="table-auto w-full">
                <thead class='bg-[#b8b8ff] h-14'>
                    <tr>
                        <th class='px-5'>#</th>
                        <th>Nom de l'équipe</th>
                        <th>Ville</th>
                        <th class='px-5'>Joueurs max</th>
                        <th class='px-3'>Détails</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody class='bg-[#ffeedd]/[.26]'>
                    @foreach ($equipes as $equipe)
                        <tr class='h-14'>
                            <td class='text-center'>{{ $equipe->id }}</td>
                            <td class='px-10'>{{ $equipe->nom_equipe }}</td>
                            <td class='px-10'>{{ $equipe->ville }}</td>
                            <td class='text-center'> {{ $equipe->joueurs_count }} / {{ $equipe->nb_joueurs_max }}</td>

                            {{-- Bouton VOIR --}}
                            <td class='text-center'>
                                <a href="{{ url('equipes/' . $equipe->id) }}"> <button
                                        class='bg-blue-200 rounded-lg p-2'>INFO</button></a>
                            </td>

                            <td class='text-center pr-1.5'>
                                <a href="{{ url('equipes/' . $equipe->id . '/edit') }}"> <button
                                        class='bg-slate-500 text-white rounded-lg p-2'>EDIT</button></a>
                            </td>

                            {{-- Bouton DELETE --}}
                            <td class='text-center px-1.5'>
                                <form action="{{ url('equipes/' . $equipe->id) }}" method="post">
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


        {{-- Formulaire --}}
        <form action="/equipes" method='post' class='hidden' id='team_form'>
            @csrf
            <div class='fixed top-0 left-0 w-screen h-screen bg-slate-600/50 flex justify-center items-center'>
                <div class='w-2/4 bg-white shadow-lg rounded-lg flex flex-col justify-between items-center p-6 gap-5'>

                    <h1 class='text-5xl'> Ajouter une nouvelle équipe !</h1>

                    <div class='my-6'>
                        @foreach ($continents as $continent)
                            <label>
                                <input class='hidden' type="radio" name="continent" value="{{ $continent->id }}">
                                <span
                                    class='w-20 p-2 rounded-lg cursor-pointer '>{{ $continent->nom_continent }}</span>
                            </label>
                        @endforeach
                    </div>

                    <div class='flex flex-wrap items-center gap-6'>


                        <input type="text" name="nom" value='{{ old('nom') }}' placeholder="Nom de l'équipe"
                            class='mb-3 p-2 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>

                        <input type="texte" name="pays" id="pays" value='{{ old('pays') }}'
                            placeholder="Pays"
                            class='mb-3 p-2 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>

                        <input type="text" name="ville" id="ville" value='{{ old('ville') }}' placeholder='Ville'
                            class='mb-3 p-2 border-b-2 border-[#ffd8be] focus:outline-none focus:border-[#ffb383] ease-in duration-300'>

                        <div>
                            <label for="joueurs">Nombre de joueurs max : </label>
                            <input type="number" name="joueurs" id="joueurs" value='9' min='9' max='9'
                                value='{{ old('joueurs') }}' placeholder='Nombre de joueurs'>
                        </div>

                    </div>

                    <div class='flex justify-center items-center gap-5'>
                        <button type='submit' class='bg-[#b8b8ff] hover:bg-[#9381ff] text-white rounded-lg px-4 py-2'>ENVOYER</button>
                        <p class='cursor-pointer text-slate-600 hover:border-[1px] hover:rounded-lg hover:border-slate-600 px-4 py-2'
                            id='close_team_form'>Cancel</p>
                    </div>
        </form>

    </section>
@endsection

@section('js')
    <script src='/assets/js/team.js'></script>
@endsection
