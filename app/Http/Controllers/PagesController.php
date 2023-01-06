<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function approvisionnements()
    {
        return view('pages.Approvisionnement.list');
    }

    public function addapprovisionnement()
    {
        return view('pages.Approvisionnement.add');
    }
    public function editapprovisionnement($ids)
    {
        return view('pages.Approvisionnement.edit', compact('ids'));
    }
    public function categorie()
    {
        return view('pages.produits.categorieproduit');
    }
    public function shopinformation()
    {
        return view('pages.parametrage.shop-information');
    }

}
