<?php

namespace App\Exports;

use App\Models\Dette;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;

class ExportDette implements FromCollection, WithHeadings, Responsable, ShouldAutoSize
{
    use Exportable;
    private $writerType = Excel::XLSX;
    private $fileName = 'listedette.xlsx';

    /**
     * @return \Illuminate\Support\Collection
     */
    private $collumns = [
        'ID',
        'NOM CLIENT',
        'NUM PHONE',
        'MONTANT DU',
        'DATE'
    ];
    public function collection()
    {
        return Dette::query()
            ->select(
                'dettes.id',
                'clients.noms',
                'clients.numero',
                'total_dette',
                'dettes.created_at'
            )->join('clients', 'dettes.client_id', '=', 'clients.id')
            ->where('dettes.user_id', Auth::user()->id)
            ->get();
        // return Dette::all();
    }
    public function headings(): array
    {
        return $this->collumns;
    }
}
