<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $roles=["Admin","User"];
    public function run()
    {

        for ($i = 0; $i < count($this->roles); $i++) {
            \DB::table('roles')->insert([
                'name' => $this->roles[$i],
            ]);
        }
    }
}
