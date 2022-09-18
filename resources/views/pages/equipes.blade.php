@extends('layouts.index')

@section('content')
    <section>
        <div class='flex gap-4'>
            <button class='bg-blue-500 text-white rounded-lg p-2' id='new_team'>NEW</button>

        </div>

        {{-- Liste d'équipes --}}
        <div class='my-8 flex justify-center'>
            <table class="table-auto w-full">
                <thead class='bg-[#b8b8ff] h-14 rounded-t-lg'>
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
                                    <button class='text-red-500 hover:bg-red-500 hover:text-white hover:rounded-lg p-2'>Retirer</button>
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

                <div class='w-2/4 h-2/4 bg-white rounded-lg flex flex-col justify-between p-6'>

                        <h1 class='text-5xl'> Ajouter une nouvelle équipe !</h1>
                        <div>
                            <label for="nom">Nom de l'équipe: </label>
                            <input type="text" name="nom" id="nom" value='{{ old('nom') }}'>
                        </div>

                        <div>
                            <label for="continent">Continent: </label>
                            <select name="continent" id="continent">
                                @foreach ($continents as $continent)
                                    <option value="{{ $continent->id }}">{{ $continent->nom_continent }}</option>
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
                            <input type="number" name="joueurs" id="joueurs" value='6' min='1' max='6'
                                value='{{ old('joueurs') }}'>
                        </div>


                        <div class='flex justify-center items-center gap-5'>
                            <button type='submit' class='bg-blue-500 text-white rounded-lg px-4 py-2'>ENVOYER</button>
                            <p class='cursor-pointer text-slate-600 hover:border-[1px] hover:rounded-lg hover:border-slate-600 px-4 py-2' id='close_team_form'>Cancel</p>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
