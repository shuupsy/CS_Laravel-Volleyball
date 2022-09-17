@extends('layouts.index')

@section('content')
    <section>
        <h1 class='text-4xl'>Équipes remplies</h1>
        @foreach ($full_team as $team)
        <ul>
            <li>{{ $team -> nom_equipe }}</li>
        </ul>
    @endforeach

    </section>

    <section>
        <h1 class='text-4xl'>Équipes NON remplies</h1>
        @foreach ($nonfull_team as $team)
            <ul>
                <li>{{ $team -> nom_equipe }}</li>
            </ul>
        @endforeach
    </section>

    <section>
        <h1 class='text-4xl'>Joueurs SANS équipe</h1>
        @foreach ($noteam_player as $player)
            <ul>
                <li>{{ $player -> nom_joueur }}</li>
            </ul>
        @endforeach
    </section>

    <section>
        <h1 class='text-4xl'>Joueurs AVEC équipe</h1>
        @foreach ($withteam_player as $player)
            <ul>
                <li>{{ $player -> nom_joueur }}</li>
            </ul>
        @endforeach
    </section>

    <section>
        <h1 class='text-4xl'>Équipes d'Europe</h1>
        @foreach ($europe_team as $team)
            <ul>
                <li>{{ $team -> nom_equipe }}</li>
            </ul>
        @endforeach
    </section>

    <section>
        <h1 class='text-4xl'>Équipes HORS Europe</h1>
        @foreach ($outside_team as $team)
            <ul>
                <li>{{ $team -> nom_equipe }}</li>
            </ul>
        @endforeach
    </section>

    <section>
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
    </section>
@endsection
