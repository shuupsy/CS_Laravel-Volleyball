<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EquipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipes')->insert([
            ['continent_id' => 1,
            'nom_equipe' => 'Poussins',
            'ville' => 'Neder-Over-Hembeek',
            'pays' => 'Belgique',
            'nb_joueurs_max' => 6
            ],

            ['continent_id' => 1,
            'nom_equipe' => 'Lady Boule',
            'ville' => 'Bruxelles',
            'pays' => 'Belgique',
            'nb_joueurs_max' => 6
            ],

            ['continent_id' => 2,
            'nom_equipe' => 'Nekoma',
            'ville' => 'Tokyo',
            'pays' => 'Japon',
            'nb_joueurs_max' => 6
            ],

            ['continent_id' => 3,
            'nom_equipe' => 'Lions',
            'ville' => 'Accra',
            'pays' => 'Ghana',
            'nb_joueurs_max' => 6
            ],

            ['continent_id' => 4,
            'nom_equipe' => 'Carasoulo',
            'ville' => 'Mexico City',
            'pays' => 'Mexique',
            'nb_joueurs_max' => 6
            ],

            ['continent_id' => 5,
            'nom_equipe' => 'Mates',
            'ville' => 'Canberra',
            'pays' => 'Australie',
            'nb_joueurs_max' => 6
            ],


        ]);
    }
}
