<?php

use Illuminate\Database\Seeder;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $type_nl = ['Honden', 'Katen', 'Vissen', 'Vogels', 'Kleine dieren'];
        $type_fr = ['Chiens', 'Chats', 'Poisson', 'Des oiseaux', 'Petits animaux'];
        $url = ['dogs', 'cats', 'fish', 'birds', 'small_animals'];
        DB::table('categories')->delete();


        foreach ($type_nl as $key => $type) {
            DB::table('categories')->insert([
                'type_nl' => $type_nl[$key],
                'type_fr' => $type_fr[$key],
                'url' => $url[$key],
            ]);
        }


        //
    }
}
