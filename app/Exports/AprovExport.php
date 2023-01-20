<?php

namespace App\Exports;

use App\Models\Approvisionnement;
use Maatwebsite\Excel\Concerns\FromCollection;

class AprovExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Approvisionnement::all();
    }
}
