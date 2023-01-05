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
Route::get('/approvisionnement/add', [App\Http\Controllers\PagesController::class, 'addapprovisionnement'])->name('addapprovisionnement');
Route::get('/approvisionnement/list', [App\Http\Controllers\HomeController::class, 'aprovisionnement'])->name('listapprovisionnement');
Route::get('/categorie', [App\Http\Controllers\HomeController::class, 'categorieproduit'])->name('categorie');
Route::get('/', function () {
    return Redirect::to('/home');
});