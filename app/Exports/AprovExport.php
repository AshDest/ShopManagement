<?php

namespace App\Exports;

use App\Models\Approvisionnement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;


class AprovExport implements FromCollection
{
    use Exportable;
    private $writerType = Excel::XLSX;
    private $fileName = 'listeprevisionvente.xlsx';
    /**
     * @return \Illuminate\Support\Collection
     */
    private $collumns = [
        'Order ID',
        'Product ID',
        'DESIGNATION PRODUIT',
        'QUANTITE',
        'PRIX UNIT',
        'TOTAL',
        'DATE APROV '
    ];
    public function collection()
    {
        return Approvisionnement::query()
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
        // return Approvisionnement::all();
    }
}
