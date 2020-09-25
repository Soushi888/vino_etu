<?php

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

//Route::get('/', function () {
//    return view('accueil_utilisateur');
//})->middleware('auth')->name('home');

Route::get('/', function () {
    return view('accueil_utilisateur');
})->middleware('auth');

Route::get('/ajouter_bouteille', function () {
    return view('ajouter_bouteille');
})->name('ajouter_bouteille');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Routes Admin
//Users
Route::get('/admin', function () {
    return view('admin.users');
})->middleware('auth')->name('admin');

//catalogue
Route::get('/admin/catalogue', function () {
    return view('admin.catalogue');
})->middleware('auth')->name('admin.catalogue');

Route::get('/admin/catalogue/ajouter', function () {
    return view('admin.catalogue.ajouter');
})->middleware('auth')->name('admin.catalogue.ajouter');

// saq
Route::get('/admin/catalogue/saq', function () {
    return view('admin.saq');
})->middleware('auth')->name('admin.saq');

// statistiques
Route::get('/admin/statistiques', function () {
    return view('admin.stats');
})->middleware('auth')->name('admin.stats');
