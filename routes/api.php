<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// // Utilisateur API
// Route::get('/utilisateurs', 'UtilisateurController@index');
// Route::get('/utilisateurs/{utilisateur}', 'UtilisateurController@show');
// Route::post('/utilisateurs', 'UtilisateurController@store');
// Route::put('/utilisateurs/{utilisateur}', 'UtilisateurController@update');
// Route::delete('/utilisateurs/{utilisateur}', 'UtilisateurController@destroy');
// // End Utilisateur API

// // SAQ API
// Route::get('/saq', 'SAQController@index');
// Route::post('/saq', 'SAQController@store');
// // End SAQ API

// // Adresse API
// Route::get('/adresses', 'AdresseController@index');
// Route::get('/adresses/{adresse}', 'AdresseController@show');
// Route::post('/adresses', 'AdresseController@store');
// Route::put('/adresses/{adresse}', 'AdresseController@update');
// Route::delete('/adresses/{adresse}', 'AdresseController@destroy');
// // End Adresse API

// // Bouteille API
Route::get('/bouteilles', 'BouteilleController@index');
Route::get('/bouteilles/{bouteille}', 'BouteilleController@show');
Route::post('/bouteilles', 'BouteilleController@store');
Route::put('/bouteilles/{bouteille}', 'BouteilleController@update');
Route::delete('/bouteilles/{bouteille}', 'BouteilleController@destroy');
// // End Bouteille API

// // Cellier API
<<<<<<< HEAD
Route::get('/celliers', 'CellierController@index');
Route::get('/celliers/{cellier}', 'CellierController@show');
Route::post('/celliers', 'CellierController@store');
Route::put('/celliers/{cellier}', 'CellierController@update');
Route::delete('/celliers/{cellier}', 'CellierController@destroy');
=======
// Route::get('/celliers', 'CellierController@index');
// Route::get('/celliers/{cellier', 'CellierController@show');
// Route::post('/celliers', 'CellierController@store');
// Route::put('/celliers/{cellier', 'CellierController@update');
// Route::delete('/celliers/{cellier', 'CellierController@destroy');
>>>>>>> dc29142b2e4e38382ce52eef68ab1b513907c51e
// // End Cellier API

// // CelliersBouteille API
// Route::get('/celliers/bouteilles', 'CellierBouteilleController@index');
// Route::get('/celliers/bouteilles/{cellierBouteille}', 'CellierBouteilleController@show');
// Route::post('/celliers/bouteilles', 'CellierBouteilleController@store');
// Route::put('/celliers/bouteilles/{cellierBouteille}', 'CellierBouteilleController@update');
// Route::delete('/celliers/bouteilles/{cellierBouteille}', 'CellierBouteilleController@destroy');
// // End CelliersBouteille API



