<?php

namespace App\Exports;

use App\Models\invoice;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvociesExport implements FromCollection
{

    public function collection()
    {
        return invoice::all();
    }
}
