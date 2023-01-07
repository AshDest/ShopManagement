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
Route::get('/approvisionnement/edit/{id}', [App\Http\Controllers\PagesController::class, 'editapprovisionnement'])->name('editapprovisionnement');
Route::get('/shopinformations', [App\Http\Controllers\PagesController::class, 'shopinformation'])->name('shopinformations');
Route::get('/categorie', [App\Http\Controllers\HomeController::class, 'categorieproduit'])->name('categorie');
Route::get('/produit', [App\Http\Controllers\HomeController::class, 'produit'])->name('produit');
Route::get('/', function () {
    return Redirect::to('/home');
});