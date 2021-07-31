<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdcutsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('prodcuts')->insert( [
            [
                'Product_name'      => 'خدمات عبر الانترنت' ,
                'description'       => 'جميع الخدمات عر موثعنا',
                'section_id'        => 1
            ] ,
            [
                'Product_name'      => 'بطاقات الاهلى' ,
                'description'       => 'مكاسب مالية بتجميع النقط',
                'section_id'        => 1
            ] ,
            [
                'Product_name'      => 'خدمات عبر الانترنت' ,
                'description'       => 'تحويل فلوس واستعلام عبر الموقع',
                'section_id'        => 2
            ] ,
            [
                'Product_name'      =>'خدمات تحويل لجميع الدول' ,
                'description'       => 'تحويل الى اى دولة ',
                'section_id'        => 3
            ]
        ]);
    }
}
