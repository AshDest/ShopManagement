<?php

namespace App\Http\Controllers;

use App\Exports\AprovExport;
use App\Exports\ExportDette;
use App\Exports\ExportPaiement;
use App\Exports\VenteExport;
use App\Exports\ExportSynthesevente;
use App\Exports\ProduitExport;
use Barryvdh\DomPDF\Facade\Pdf;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function approvisionnements()
    {
        return view('pages.Approvisionnement.list');
    }

    public function addapprovisionnement($ids)
    {
        return view('pages.Approvisionnement.add', compact('ids'));
    }
    public function editapprovisionnement($approv_id)
    {
        return view('pages.Approvisionnement.edit', compact('approv_id'));
    }
    public function categorie()
    {
        return view('pages.produits.categorieproduit');
    }
    public function shopinformation()
    {
        return view('pages.parametrage.shop-information');
    }
    public function listProduits()
    {
        return view('pages.produits.list-produit');
    }

    public function mesure()
    {
        return view('pages.produits.mesure');
    }

    public function syntheticliste()
    {
        return view('pages.rapports.list-synthetic');
    }


    public function paiements()
    {
        return view('pages.terminals.paiement');
    }
    public function depenses()
    {
        return view('pages.terminals.depense');
    }
    public function vente()
    {
        return view('pages.terminals.vente');
    }
    public function listevente()
    {
        return view('pages.terminals.listevente');
    }
    public function listconversion()
    {
        return view('pages.conversion.list-conversion');
    }
    public function listeconversion()
    {
        return view('pages.terminals.terminal-conversion');
    }
    public function terminaladdconversion()
    {
        return view('pages.terminals.terminal-add-conversion');
    }
    public function addconversion()
    {
        return view('pages.conversion.add-conversion');
    }

    public function editconversion($conversion)
    {
        return view('pages.conversion.modif-conversion', compact('conversion'));
    }

    public function listeproduitterminal(){
        return view('pages.terminals.terminal-listeproduit');
    }

    public function termianladdapprovisionnement($ids)
    {
        return view('pages.terminals.terminal-add-aprov', compact('ids'));
    }

    // LES EXPORTATIONS ICI
    public function listeventexport()
    {
        return new VenteExport();
        // return Excel::download(new VenteExport, 'listevente.xlsx');
        // return Excel::download(new UsersExport, 'invoices.csv', \Maatwebsite\Excel\Excel::CSV);
        // return Excel::download(new VenteExport, 'invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
    public function intervalrapport($interval)
    { // return Excel::download(new VenteExport, 'listevente.xlsx');
        return (new VenteExport)->forInterval($interval)->download('listeventeinterval.xlsx');
        // return new VenteExport()->forInterval($interval);
        // return view('pages.Approvisionnement.add', compact('interval'));
    }
    public function listepreveiwvente()
    {
        return new ExportSynthesevente();
    }
    public function listeaprov()
    {
        return new AprovExport();
    }
    public function listeproduit()
    {
        return new ProduitExport();
    }
    public function listedette()
    {
        return new ExportDette();
    }
    public function listepaiment()
    {
        return new  ExportPaiement();
    }


    public function fichedepense($projet)
    {
        $pdf = Pdf::loadView('pdf.fiche-depense',compact('projet'));
        return $pdf->download('fiche-depense.pdf');
    }
}
