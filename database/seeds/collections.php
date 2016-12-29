<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class collections extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $types = ['Splash´n fun', 'luxury', 'new', 'on sale', 'other'];

        DB::table('collections')->delete();



        foreach ($types as $key => $type) {
            DB::table('collections')->insert([
                'type' => $type,
                'deleted_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
