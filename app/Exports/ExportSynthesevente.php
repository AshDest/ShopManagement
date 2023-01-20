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
        'CODE',
        'DESCRIPTION',
        'qte_stock',
        'Prix Achat Total',
        'Prix Vente Total',
        'Dernier Mise en jour '
    ];
    private $collumn2 = [
        'code',
        'description',
        'qte_stock',
        'pu_achat',
        'pu',
        'category_id',
        'designationmesure',
        'updated_at'
    ];

    public function collection()
    {
        return Produit::query()
            ->select($this->collumns)->get();
    }
    public function headings(): array
    {
        return $this->collumns;
    }
}