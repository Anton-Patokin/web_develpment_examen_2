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
        DB::table('category_translations')->delete();


        foreach ($type_nl as $key => $type) {
            DB::table('categories')->insert([
                'url' => $url[$key],
            ]);

            DB::table('category_translations')->insert([
                "category_id"=>DB::table('categories')->where('url', $url[$key])->first()->id,
                'locale'=>'fr',
                'text'=>$type_fr[$key],
            ]);

            DB::table('category_translations')->insert([
                "category_id"=>DB::table('categories')->where('url', $url[$key])->first()->id,
                'locale'=>'nl',
                'text'=>$type_nl[$key],
            ]);
        }


        //
    }
}
