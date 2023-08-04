<?php

namespace App\Http\Livewire\Construction;

use App\Models\Projetcontrustion;
use Livewire\Component;
use PDF;
class PdfFichedepenses extends Component
{
    public $projet;
    public $codeprojet, $designationprojet, $responsableprojet, $contactreponsable, $statut_projet, $date_state, $date_end;
    // variable pour la table depense
    public $codeprojet_dep, $designationprojet_dep, $designationdepense, $mtdepense, $depensedevise, $date_debit, $date_fin;
    public $all_month, $dep_per_month, $taux_du_jour;
    public function render()
    {
        $this->generatePdf();
        return view('livewire.construction.pdf-fichedepenses');
    }


public function generatePdf()
{
    $pdfData = [
        'name' => $this->name,
        'age' => $this->age,
        // Ajoutez d'autres données que vous souhaitez passer au fichier PDF
    ];

    $pdf = PDF::loadView('livewire.pdf-generator', $pdfData);

    return $pdf->download('exemple_pdf.pdf');
}
}
