<?php

namespace App\Exports;

use App\Models\contact;
use Maatwebsite\Excel\Concerns\FromCollection;

class contactExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return contact::select('name','number')->get();
    }
}
