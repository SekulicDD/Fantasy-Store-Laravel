<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            NavMenuSeeder::class,
            ProductSeeder::class,
            CategorySeeder::class,
            MainCategorySeeder::class,
            ImagesSeeder::class,
            RolesSeeder::class,
            UserSeeder::class,
            CommentSeeder::class
        ]);
    }
}
