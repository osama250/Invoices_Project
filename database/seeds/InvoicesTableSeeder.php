<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoicesTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('invoices')->insert( [

            [
                'invoice_number'        => 'as88' ,
                'invoice_Date'          => '2021-08-1 04:01:42' ,
                'Due_date'              => '2021-08-12 04:01:42' ,
                'product'               => 'بطاقات الاهلى' ,
                'section_id'            => 1 ,
                'Amount_collection'     => 50000 ,
                'Amount_Commission'     => 5000 ,
                'Discount'              => 0 ,
                'Value_VAT'             => 250.00 ,
                'Rate_VAT'              => '5%' ,
                'Total'                 => 5250.00 ,
                'Status'                => 'مدفوعة',
                'Value_Status'          => 1,
                'note'                  => 'جميع الخدمات عبر الانترنت من منزلك ' ,
                'created_at'            => '2021-08-1 04:01:42'
            ] ,
            [
                'invoice_number'        => 'as99' ,
                'invoice_Date'          => '2021-08-13 04:01:42' ,
                'Due_date'              => '2021-08-19 04:01:42' ,
                'product'               => 'بطاقات الاهلى' ,
                'section_id'            => 1 ,
                'Amount_collection'     => 70000 ,
                'Amount_Commission'     => 7000 ,
                'Discount'              => 0 ,
                'Value_VAT'             => 350.00 ,
                'Rate_VAT'              => '5%' ,
                'Total'                 => 7350.00 ,
                'Status'                => 'غير مدفوعة',
                'Value_Status'          => 2,
                'note'                  => 'جميع الخدمات عبر الانترنت من منزلك ' ,
                'created_at'            => '2021-08-13 04:01:42'
            ]

        ]);
    }
}
