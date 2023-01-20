<?php

namespace App\Exports;

use App\Models\Produit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;

class ExportSynthesevente implements FromCollection, WithHeadings, Responsable, ShouldAutoSize
{
    use Exportable;
    private $writerType = Excel::XLSX;
    private $fileName = 'listeprevisionvente.xlsx';
    /**
     * @return \Illuminate\Support\Collection
     */
    private $collumns = [
        'code',
        'description',
        'qte_stock',
        'Prix Achat Total',
        'Prix Vente Total',
        'Dernier Mise en jour '
    ];

    public function collection()
    {
        return Produit::all();
    }
    public function headings(): array
    {
        return $this->collumns;
    }
}