<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function aprovisionnement()
    {
        return view('pages.Approvisionnement.list');
    }
    public function categorie()
    {
        return view('pages.produits.categorieproduit');
    }
}