<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// LES ROUTES ADMINS ET GESTIONNAIRES


// ->middleware(['auth', 'role:admin'])

Route::group(['middleware' => ['auth', 'redirect_based_on_role']], function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin/approvisionnement/list', [App\Http\Controllers\PagesController::class, 'approvisionnements'])->name('listapprovisionnement');
    Route::get('/admin/approvisionnement/add/{ids}', [App\Http\Controllers\PagesController::class, 'addapprovisionnement'])->name('addapprovisionnement');
    Route::get('/admin/approvisionnement/edit/{approv_id}', [App\Http\Controllers\PagesController::class, 'editapprovisionnement'])->name('editapprovisionnement');
    Route::get('/admin/list-produits', [App\Http\Controllers\PagesController::class, 'listProduits'])->name('listProduits');
    Route::get('/admin/mesures', [App\Http\Controllers\PagesController::class, 'mesure'])->name('mesures');
    Route::get('/admin/shopinformations', [App\Http\Controllers\PagesController::class, 'shopinformation'])->name('shopinformations');
    Route::get('/admin/categorie', [App\Http\Controllers\HomeController::class, 'categorieproduit'])->name('categorie');
    Route::get('/admin/produit', [App\Http\Controllers\HomeController::class, 'produit'])->name('produit');
    Route::get('/admin/compteuser', [App\Http\Controllers\HomeController::class, 'compteuser'])->name('compteuser');
    Route::get('/admin/synthetic', [App\Http\Controllers\PagesController::class, 'syntheticliste'])->name('synthetic');
    Route::get('/admin/listconversion', [App\Http\Controllers\PagesController::class, 'listconversion'])->name('listconversion');
    Route::get('/admin/conversion/add', [App\Http\Controllers\PagesController::class, 'addconversion'])->name('addconversion');
    Route::get('/admin/conversion/edit/{conversion}', [App\Http\Controllers\PagesController::class, 'editconversion'])->name('editconversion');
    // taux de d'echange route
    Route::get('/admin/taux', [App\Http\Controllers\HomeController::class, 'taux'])->name('taux');
    Route::get('/admin/contruction/depense', [App\Http\Controllers\HomeController::class, 'depenseconstruction'])->name('depenseconstruction');

});




// Route::group(['middleware' => ['auth', 'role:seler']], function () {
// LES ROUTES DU TERMINALS DE VENTES
Route::group(['middleware' => ['auth', 'terminal_vente']], function () {
    Route::get('/seller/paiement', [App\Http\Controllers\PagesController::class, 'paiements'])->name('paiements');
    Route::get('/seller/vente', [App\Http\Controllers\PagesController::class, 'vente'])->name('vente');
    Route::get('/seller/listevente', [App\Http\Controllers\PagesController::class, 'listevente'])->name('listevente');
    Route::get('/seller/depenses', [App\Http\Controllers\PagesController::class, 'depenses'])->name('depenses');
    Route::get('/seller/listeconversion', [App\Http\Controllers\PagesController::class, 'listeconversion'])->name('listeconversion');
    Route::get('/seller/conversion/add', [App\Http\Controllers\PagesController::class, 'terminaladdconversion'])->name('addconversionterminal');

    Route::get('/seller/listeproduit', [App\Http\Controllers\PagesController::class, 'listeproduitterminal'])->name('listeproduitterminal');
    Route::get('/seller/approvisionnement/add/{ids}', [App\Http\Controllers\PagesController::class, 'termianladdapprovisionnement'])->name('termianladdapprovisionnement');
});








// les routes pour tout les rapports
Route::get('/listevente/excel', [App\Http\Controllers\PagesController::class, 'listeventexport'])->name('listeventexport');
Route::get('/intervalrapport/{interval}', [App\Http\Controllers\PagesController::class, 'intervalrapport'])->name('intervalrapport');
Route::get('/listepreveiwvente/excel', [App\Http\Controllers\PagesController::class, 'listepreveiwvente'])->name('listepreveiwvente');
Route::get('/listeaprov/excel', [App\Http\Controllers\PagesController::class, 'listeaprov'])->name('listeaprov');
Route::get('/listeproduit/excel', [App\Http\Controllers\PagesController::class, 'listeproduit'])->name('listeproduit');
Route::get('/listedette/excel', [App\Http\Controllers\PagesController::class, 'listedette'])->name('listedette');
Route::get('/listepaiment/excel', [App\Http\Controllers\PagesController::class, 'listepaiment'])->name('listepaiment');
Route::get('/', function () {
    return Redirect::to('/admin/home');
});
