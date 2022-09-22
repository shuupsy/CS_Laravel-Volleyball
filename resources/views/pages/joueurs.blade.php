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

        @include('partial.form_joueurs')

    </section>
@endsection

@section('js')
    <script src='/assets/js/player.js'></script>
    
    @if (Session::has('errors'))
    <script>
        player_form.classList.remove('hidden')
    </script>
    @endif
@endsection
