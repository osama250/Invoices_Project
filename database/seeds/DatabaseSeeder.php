<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
         $this->call( [
             SectionsTableSeeder::class ,
             ProdcutsTableSeeder::class ,
             InvoicesTableSeeder::class ,
             Invoices_DetailTableSeeder::class ,
             PermissionTableSeeder::class ,
             CreateAdminUserSeeder::class
        ]);
    }
}
