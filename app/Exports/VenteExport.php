<?php

namespace App\Exports;

use App\Models\Vente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VenteExport implements FromCollection, WithHeadings
{
    private $collumns = [
        'id',
        'name',
        'email',
        'role',
        'created_at',
    ];
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Vente::query()
            ->select($this->collumns)
            ->where('role', 'Admin')->get();
    }
    public function headings(): array
    {
        return $this->collumns;
    }
}