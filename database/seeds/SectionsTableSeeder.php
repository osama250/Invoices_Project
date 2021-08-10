<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sections')->insert( [
            [
                'section_name'      => 'البنك الاهلى' ,
                'description'       => 'خدمات متميزة',
                'Created_by'        => 'Osama',
                'created_at'        => '2021-07-29 04:01:42'
            ] ,
            [
                'section_name'      => 'بنك مصر' ,
                'description'       => 'خدمات متميزة',
                'Created_by'        => 'Osama',
                'created_at'        => '2021-07-29 04:01:42'
            ] ,
            [
                'section_name'      => 'البنك العربى' ,
                'description'       => 'خدمات متميزة',
                'Created_by'        => 'Osama',
                'created_at'        => '2021-07-29 04:01:42'
            ]
        ]);
    }
}
