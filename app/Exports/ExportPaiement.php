<?php

namespace App\Exports;

use App\Models\Paiement;
use App\Models\Paiment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;

class ExportPaiement implements FromCollection, WithHeadings, Responsable, ShouldAutoSize
{
    use Exportable;
    private $writerType = Excel::XLSX;
    private $fileName = 'listepaiment.xlsx';
    /**
     * @return \Illuminate\Support\Collection
     */
    private $collumns = [
        'ID',
        'NOM CLIENT',
        'NUM PHONE',
        'MONTANT PAYER',
        'RESTE A PAYER',
        'DATE'
    ];
    public function collection()
    {
        return Paiement::query()
            ->select(
                'paiements.id',
                'clients.noms',
                'clients.numero',
                'montant_paie',
                'reste_paie',
                'paiements.created_at'
            )->join('dettes', 'paiements.dette_id', '=', 'dettes.id')
            ->join('clients', 'dettes.client_id', '=', 'clients.id')
            ->where('paiements.user_id', Auth::user()->id)
            ->get();
        // return Paiment::all();
    }
    public function headings(): array
    {
        return $this->collumns;
    }
}
