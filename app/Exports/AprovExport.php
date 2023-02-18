<?php

namespace App\Exports;

use App\Models\Approvisionnement;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;


class AprovExport implements FromCollection, WithHeadings, Responsable, ShouldAutoSize
{
    use Exportable;
    private $writerType = Excel::XLSX;
    private $fileName = 'listeaprov.xlsx';
    /**
     * @return \Illuminate\Support\Collection
     */
    private $collumns = [
        'Order ID',
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
                'produits.code',
                'produits.description',
                'qte_approv',
                'pu_approv',
                'pt_approv',
                'approvisionnements.updated_at'
            )->join('produits', 'approvisionnements.produit_id', '=', 'produits.id')
            ->get();
        // return Approvisionnement::all();
        //  ->where('approvisionnements.user_id', Auth::user()->id)
    }
    public function headings(): array
    {
        return $this->collumns;
    }
}
