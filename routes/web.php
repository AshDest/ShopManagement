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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'role:admin'])
    ->name('home');



Route::get('/approvisionnement/list', [App\Http\Controllers\PagesController::class, 'approvisionnements'])->name('listapprovisionnement');
Route::get('/approvisionnement/add/{ids}', [App\Http\Controllers\PagesController::class, 'addapprovisionnement'])->name('addapprovisionnement');
Route::get('/approvisionnement/edit/{approv_id}', [App\Http\Controllers\PagesController::class, 'editapprovisionnement'])->name('editapprovisionnement');
Route::get('/list-produits', [App\Http\Controllers\PagesController::class, 'listProduits'])->name('listProduits');
Route::get('/mesures', [App\Http\Controllers\PagesController::class, 'mesure'])->name('mesures');
Route::get('/shopinformations', [App\Http\Controllers\PagesController::class, 'shopinformation'])->name('shopinformations');
Route::get('/categorie', [App\Http\Controllers\HomeController::class, 'categorieproduit'])->name('categorie');
Route::get('/produit', [App\Http\Controllers\HomeController::class, 'produit'])->name('produit');
Route::get('/compteuser', [App\Http\Controllers\HomeController::class, 'compteuser'])->name('compteuser');
Route::get('/synthetic', [App\Http\Controllers\PagesController::class, 'syntheticliste'])->name('synthetic');
Route::get('/listconversion', [App\Http\Controllers\PagesController::class, 'listconversion'])->name('listconversion');
Route::get('/conversion/add', [App\Http\Controllers\PagesController::class, 'addconversion'])->name('addconversion');



Route::group(['middleware' => ['auth', 'role:seler']], function () {
    // LES ROUTES DU TERMINALS DE VENTES
    Route::get('/paiement', [App\Http\Controllers\PagesController::class, 'paiements'])->name('paiements');
    Route::get('/vente', [App\Http\Controllers\PagesController::class, 'vente'])->name('vente');
    Route::get('/listevente', [App\Http\Controllers\PagesController::class, 'listevente'])->name('listevente');
    Route::get('/depenses', [App\Http\Controllers\PagesController::class, 'depenses'])->name('depenses');
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
    return Redirect::to('/home');
});