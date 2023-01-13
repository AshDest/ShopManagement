<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}