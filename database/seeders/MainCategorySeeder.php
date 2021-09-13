<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $names = ["FASHION & ACC", "SHOES & FOOTWEAR","ELECTRONICS"];

    public function run()
    {

        for ($i = 0; $i < count($this->names); $i++) {
            \DB::table('main_categories')->insert([
                'name' => $this->names[$i],
            ]);
        }
    }
}
