<?php

namespace App\Http\Controllers;

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
        return view('pages/home');
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
}