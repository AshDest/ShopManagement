<?php

namespace App\Exports;

use App\Models\Produit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;

class ProduitExport implements FromCollection, WithHeadings, Responsable, ShouldAutoSize
{
    use Exportable;
    private $writerType = Excel::XLSX;
    private $fileName = 'listeproduit.xlsx';
    /**
     * @return \Illuminate\Support\Collection
     */
    private $collumns = [
        'CODE',
        'DESIGNATION PRODUIT',
        'QUANTITE',
        'PRIX D\'ACHAT UNIT',
        'PRIX DE VENTE UNIT',
        'CATEGORIE',
        'VENDEUR'
    ];
    public function collection()
    {
        return Produit::query()
            ->select(
                'code',
                'description',
                DB::raw("concat(qte_stock,' ',designationmesure)"),
                'pu_achat',
                'pu',
                'categories.designation',
                'users.username'
            )->join('categories', 'produits.category_id', '=', 'categories.id')
            ->join('users', 'produits.user_id', '=', 'users.id')
            ->get();
        // return Produit::all();
    }
    public function headings(): array
    {
        return $this->collumns;
    }
}
