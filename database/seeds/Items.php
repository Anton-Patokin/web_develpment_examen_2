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
        DB::table('item_translations')->delete();

        for ($i = 0; $i < 10; $i++) {

            $title = str_random(25);
            $description = str_random(200);
            $url = str_random(10) . '.jpg';

            DB::table('items')->insert([
                'price' => 12.15,
                'url' => $url,
                'position' => rand(1, 15),
            ]);
            DB::table('item_translations')->insert([
                "item_id" => DB::table('items')->where('url', $url)->first()->id,
                'locale' => 'fr',
                'title' => $title . "_fr",
                'description' => $description,
            ]);

            DB::table('item_translations')->insert([
                "item_id" => DB::table('items')->where('url', $url)->first()->id,
                'locale' => 'nl',
                'title' => $title . "_nl",
                'description' => $description,
            ]);


        }
    }
}
