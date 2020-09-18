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

Route::apiResources([
    'users' => 'UserController',
    'bouteilles' => 'BouteilleController',
    'celliers' => 'CellierController',
    'celliers.bouteilles' => 'CellierBouteilleController',
    'celliersBouteilles' => 'CellierBouteilleController'
]);
Route::get('/users/{user}/celliers', 'UserController@showCelliers');
Route::put('/celliersBouteilles/{cellierBouteille}', 'CellierBouteilleController@update');

// SAQ API
Route::get('/saq', 'SAQController@getProduits');
Route::post('/saq', 'SAQController@ajouterProduit');
// End SAQ API

// CelliersBouteille API

// Route::get('/celliers/{cellier}/bouteilles', 'CellierBouteilleController@index');
// Route::get('/celliers/{cellier}/bouteilles/{bouteille}', 'CellierBouteilleController@show');
// Route::post('/celliers/{cellier}/bouteilles', 'CellierBouteilleController@store');
Route::put('/celliers/{cellier}/bouteilles/{bouteille}', 'CellierBouteilleController@update');
Route::delete('/celliers/{cellier}/bouteilles/{bouteille}', 'CellierBouteilleController@destroy');
// End CelliersBouteille API

Route::fallback(function(){
    return response()->json(["erreur"=>"404 - page non trouvée"]);
});



