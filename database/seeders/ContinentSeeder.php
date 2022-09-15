<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('continents')->insert([
            ['nom' => 'Europe'],
            ['nom' => 'Asie'],
            ['nom' => 'Afrique'],
            ['nom' => 'Amérique'],
            ['nom' => 'Océanie'],
        ]);
    }
}
