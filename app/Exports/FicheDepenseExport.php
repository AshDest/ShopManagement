<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FicheDepenseExport implements FromView
{
    use Exportable;
    // private $writerType = Excel::XLSX;
    // private $fileName = 'listevente.xlsx';

      private $writerType = Excel::DOMPDF;
     private $fileName = 'fichedepense.pdf';

    public $projet;
    public function __construct($projet = null)
    {
        $this->$projet = $$projet;
    }
    public function view(): View
    {
        dd($this->projet);
        return view('pages.construction.fiche-depense', ["projet" => $this->projet]);
    }
}
