<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        for ($i = 0; $i < 8; $i++) {
            \DB::table('comments')->insert([
                'user_id' => rand(1,2),
                'product_id' => rand(1,15),
                'content'=>"test komentari",
            ]);
        }
    }
}
