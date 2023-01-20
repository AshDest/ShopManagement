<?php

namespace App\Exports;

use App\Models\Vente;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Drawing;

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
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Vente::query()
            ->select($this->collumns)->get();
    }
    public function headings(): array
    {
        return $this->collumns;
    }

    // public function drawings()
    // {
    //     $drawing = new Drawing();
    //     $drawing->setName('Logo');
    //     $drawing->setDescription('This is my logo');
    //     $drawing->setPath(public_path('/img/logo.jpg'));
    //     $drawing->setHeight(90);
    //     $drawing->setCoordinates('B3');

    //     return $drawing;
    // }
}