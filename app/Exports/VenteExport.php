<?php

namespace App\Exports;

use App\Models\Vente;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;
use Carbon\Carbon;

class VenteExport implements FromCollection, WithHeadings, Responsable, ShouldAutoSize
{
    use Exportable;
    private $writerType = Excel::XLSX;
    private $fileName = 'listevente.xlsx';

    //  private $writerType = Excel::DOMPDF;
    // private $fileName = 'listevente.pdf';
    // private $headers = [
    //     'Content-Type' => 'text/csv',
    // ];
    private $collumns = [
        'id',
        'code',
        'total',
        'montant_paie',
        'rest_paie',
        'created_at',
    ];

    private $collumn2 = [
        'NUM',
        'CODE VENTE',
        'PRIX DE VENTE TOTLA',
        'MONTANT PAYER',
        'RESTE A PAYER',
        'DATE DE VENTE',
    ];
    private $dt_from;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $dt_to = Carbon::now()->toDateTimeString();
        // dd($this->year);
        if ($this->dt_from) {
            return Vente::query()
                ->select($this->collumns)
                ->whereBetween('created_at', [$this->dt_from, $dt_to])
                ->get();
        } else {
            return Vente::query()
                ->select($this->collumns)->get();
        }
        // return Vente::query()->whereYear('created_at', $this->year);
    }
    public function headings(): array
    {
        return $this->collumn2;
    }

    public function forInterval(string $dt_from)
    {
        $this->dt_from = $dt_from;

        return $this;
    }
}