<?php

namespace App\Http\Controllers;

use App\Models\Parametrage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vars = Parametrage::find(1);
        if ($vars) {
            return view('pages.home');
        } else {
            return view('pages.starter');
        }
    }
    public function aprovisionnement()
    {
        return view('pages.Approvisionnement.list');
    }
    public function categorieproduit()
    {
        return view('pages.produits.categorieproduit');
    }
    public function produit()
    {
        return view('pages.produits.produit');
    }
    public function compteuser()
    {
        return view('pages.parametrage.utilisateurs');
    }

    public function taux()
    {
        return view('pages.parametrage.taux');
    }
    public function depenseconstruction(){
        return view('pages.construction.depenseconstruction');
    }
    public function detaildepense($projet){
        return view('pages.construction.details-depense',compact('projet'));
    }
    public function fichedepensepdf($projet){
        return view('pages.construction.fiche-depense',compact('projet'));
    }
}
