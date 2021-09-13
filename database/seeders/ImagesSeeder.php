<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('images')->insertGetId([
            "name"=>"tmp.jpg",
            "path"=>"assets/img/tmp.jpg"
        ]);

        for ($i = 1; $i <= 33; $i++) {
            $id = \DB::table('images')->insertGetId([
                "name"=>$i.".jpg",
                "path"=>"assets/img/".$i.".jpg",
            ]);

        }
    }
}
