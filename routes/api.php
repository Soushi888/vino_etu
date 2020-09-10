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
// Route::get('/utilisateurs/{id}', 'UtilisateurController@show');
// Route::post('/utilisateurs', 'UtilisateurController@store');
// Route::put('/utilisateurs/{id}', 'UtilisateurController@update');
// Route::delete('/utilisateurs/{id}', 'UtilisateurController@destroy');
// // End Utilisateur API

// // SAQ API
// Route::get('/saq', 'SAQController@index');
// Route::post('/saq', 'SAQController@store');
// // End SAQ API

// // Adresse API
// Route::get('/adresses', 'AdresseController@index');
// Route::get('/adresses/{id}', 'AdresseController@show');
// Route::post('/adresses', 'AdresseController@store');
// Route::put('/adresses/{id}', 'AdresseController@update');
// Route::delete('/adresses/{id}', 'AdresseController@destroy');
// // End Adresse API

// // Bouteille API
// Route::get('/bouteilles', 'BouteilleController@index');
// Route::get('/bouteilles/{id}', 'BouteilleController@show');
// Route::post('/bouteilles', 'BouteilleController@store');
// Route::put('/bouteilles/{id}', 'BouteilleController@update');
// Route::delete('/bouteilles/{id}', 'BouteilleController@destroy');
// // End Bouteille API

// // Cellier API
// Route::get('/celliers', 'CellierController@index');
// Route::get('/celliers/{id}', 'CellierController@show');
// Route::post('/celliers', 'CellierController@store');
// Route::put('/celliers/{id}', 'CellierController@update');
// Route::delete('/celliers/{id}', 'CellierController@destroy');
// // End Cellier API

// // CelliersBouteille API
// Route::get('/celliers/bouteilles', 'CellierBouteilleController@index');
// Route::get('/celliers/bouteilles/{id}', 'CellierBouteilleController@show');
// Route::post('/celliers/bouteilles', 'CellierBouteilleController@store');
// Route::put('/celliers/bouteilles/{id}', 'CellierBouteilleController@update');
// Route::delete('/celliers/bouteilles/{id}', 'CellierBouteilleController@destroy');
// // End CelliersBouteille API



