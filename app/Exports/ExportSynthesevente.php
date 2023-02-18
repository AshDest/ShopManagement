<?php

namespace App\Exports;

use App\Models\Produit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\DB;
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
        'QUANTIE',
        'PRIX D\'ACHAT TOTAL',
        'PRIX DE VENTE TOTAL',
        'MESURE',
        'DERNIER MISE EN JOUR '
    ];


    public function collection()
    {
        return Produit::query()
            ->select(
                'code',
                'description',
                'qte_stock',
                DB::raw("pu_achat*qte_stock"),
                DB::raw("pu*qte_stock"),
                'designationmesure',
                'updated_at'
            )
            ->where('user_id', Auth::user()->id)
            ->get();
    }
    public function headings(): array
    {
        return $this->collumns;
    }
}
