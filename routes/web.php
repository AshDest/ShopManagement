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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/approvisionnement/list', [App\Http\Controllers\PagesController::class, 'approvisionnements'])->name('listapprovisionnement');
Route::get('/approvisionnement/add/{ids}', [App\Http\Controllers\PagesController::class, 'addapprovisionnement'])->name('addapprovisionnement');
Route::get('/approvisionnement/edit/{approv_id}', [App\Http\Controllers\PagesController::class, 'editapprovisionnement'])->name('editapprovisionnement');
Route::get('/list-produits', [App\Http\Controllers\PagesController::class, 'listProduits'])->name('listProduits');
Route::get('/mesures', [App\Http\Controllers\PagesController::class, 'mesure'])->name('mesures');

Route::get('/shopinformations', [App\Http\Controllers\PagesController::class, 'shopinformation'])->name('shopinformations');
Route::get('/categorie', [App\Http\Controllers\HomeController::class, 'categorieproduit'])->name('categorie');
Route::get('/produit', [App\Http\Controllers\HomeController::class, 'produit'])->name('produit');
Route::get('/compteuser', [App\Http\Controllers\HomeController::class, 'compteuser'])->name('compteuser');

Route::get('/paiement', [App\Http\Controllers\PagesController::class, 'paiements'])->name('paiements');
Route::get('/vente', [App\Http\Controllers\PagesController::class, 'vente'])->name('vente');
Route::get('/listevente', [App\Http\Controllers\PagesController::class, 'listevente'])->name('listevente');

Route::get('/synthetic', [App\Http\Controllers\PagesController::class, 'syntheticliste'])->name('synthetic');
Route::get('/', function () {
    return Redirect::to('/home');
});