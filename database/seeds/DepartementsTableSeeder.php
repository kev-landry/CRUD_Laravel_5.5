<?php

use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departements')->insert([
            'departement_name' => 'Direction'
        ]);
        DB::table('departements')->insert([
            'departement_name' => 'Dev'
        ]);
        DB::table('departements')->insert([
            'departement_name' => 'Commercial'
        ]);
        DB::table('departements')->insert([
            'departement_name' => 'Hébergement'
        ]);
    }
}
