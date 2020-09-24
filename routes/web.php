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

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');

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



Route::get('/modal', function () {
    return view('modal_modifier_bouteille');
})->name('home');


Route::get('/test', function () {
    return view('test');
})->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', function () {
    return view('accueil_utilisateur');
})->middleware('auth');
