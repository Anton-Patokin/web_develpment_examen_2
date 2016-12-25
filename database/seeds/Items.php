<?php

use Illuminate\Database\Seeder;

class Items extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();

        for ($i=0;$i<10;$i++){
            DB::table('items')->insert([
                'title_nl' => str_random(10).'nl',
                'title_fr' => str_random(10).'fr',
                'price' => 12.15,
                'url'=>str_random(10).'jpg',
                'position'=>rand(1,15),
            ]);
        }
    }
}
