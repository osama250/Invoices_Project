<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
         $this->call( [
             SectionsTableSeeder::class ,
             ProdcutsTableSeeder::class ,
             PermissionTableSeeder::class ,
             CreateAdminUserSeeder::class
        ]);
    }
}
