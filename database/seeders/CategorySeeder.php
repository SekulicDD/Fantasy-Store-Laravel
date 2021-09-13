<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $names = ["Men's T-Shirts", "Women's T-Shirts","Men's Watches","Women's Watches","Men's Shoes","Women's Shoes","Kid's Toys","Headphones"];
    private $main = [1,1,1,1,2,2,2,3];

    public function run()
    {
        for ($i = 0; $i < count($this->names); $i++) {
            \DB::table('categories')->insert([
                'name' => $this->names[$i],
                'main_category_id' => $this->main[$i],
            ]);
        }
    }
}
