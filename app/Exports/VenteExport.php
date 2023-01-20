<?php

namespace App\Exports;

use App\Models\Vente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VenteExport implements FromCollection, WithHeadings
{
    private $collumns = [
        'id',
        'code',
        'total',
        'montant_paie',
        'rest_paie',
        'created_at',
    ];
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Vente::query()
            ->select($this->collumns)->get();
    }
    public function headings(): array
    {
        return $this->collumns;
    }
}