<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class FicheDepenseExport implements FromView,ShouldAutoSize, WithEvents
{
    use Exportable;
    // private $writerType = Excel::XLSX;
    // private $fileName = 'listevente.xlsx';

    //   private $writerType = Excel::DOMPDF;
    //  private $fileName = 'fichedepense.pdf';

    public $projet;
    public function __construct($projet)
    {
        $this->projet = $projet;
    }
    public function view(): View
    {
        return view('pages.construction.fiche-depense', ["projet" => $this->projet]);
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A4:' . $event->sheet->getHighestColumn() . $event->sheet->getHighestRow())
                    ->getBorders()->getAllBorders()->setBorderStyle('thin');
            },
        ];
    }
}
