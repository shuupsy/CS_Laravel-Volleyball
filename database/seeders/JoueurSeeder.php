<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JoueursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('joueurs')->insert([
            [
                'nom_joueur' => Faker::create()->lastName,
                'prenom_joueur' => Faker::create()->firstName,
                'age' => Faker::create()->numberBetween($min=5, $max=90),
                'telephone' => Faker::create()->phoneNumber,
                'mail' => Faker::create()->email,
                'genre' => Faker::create()->randomElement($genre = array('F','H','')),
                'pays_origine' => Faker::create()->country,
                'role_id' => Faker::create()->numberBetween($min=1, $max=4),
                'equipe_id' => Faker::create()->randomElement($equipe = array('1','2','3', '4', '5', '')),
            ],
        ]);
    }
}
