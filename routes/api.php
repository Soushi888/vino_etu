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
    'celliers.bouteilles' => 'CellierBouteilleController'
]);

// Extension de la route users
Route::get('/users/{user}/celliers', 'UserController@showCelliers');

// celliersBouteilles API
Route::get('/transactions/{transaction}', 'CellierBouteilleController@showTransaction');
Route::put('/transactions/{transaction}', 'CellierBouteilleController@updateTransaction');
Route::delete('/transactions/{transaction}', 'CellierBouteilleController@destroyTransaction');
// End celliersBouteilles API

// SAQ API
Route::get('/saq', 'SAQController@getProduits');
Route::post('/saq', 'SAQController@ajouterProduit');
// End SAQ API

Route::fallback(function(){
    return response()->json(["erreur"=>"404 - ressource non trouvée"]);
});



