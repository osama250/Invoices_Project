<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Invoices_DetailTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('invoice_details')->insert( [
            'id_Invoice'        => 1 ,
            'invoice_number'    => 'as88',
            'product'           => 'بطاقات الاهلى' ,
            'Section'           => 1 ,
            'Status'            => 'غير مدفوعة' ,
            'Value_Status'      => 2 ,
            'note'              => 'جميع الخدمات عبر الانترنت من منزلك ' ,
            'user'              => 'Osama' ,
            'created_at'        => '2021-08-1 04:01:42'
        ]);
    }
}
