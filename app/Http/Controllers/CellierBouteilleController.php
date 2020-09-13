<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\CellierBouteille;

/**
 * Gère l'API celliers/bouteilles
 * @package App\Http\Controllers
 */
class CellierBouteilleController extends Controller
{
    /**
     * Retourne toutes les bouteilles d'un cellier.
     * @param $Cellier
     * @return JsonResponse
     */
    public function index($Cellier) {

        return Response::json(CellierBouteille::all());
    }


    /**
     * Retourne une bouteille d'un cellier
     * @param CellierBouteille $CellierBouteille
     * @return JsonResponse
     */
    public function show(CellierBouteille $CellierBouteille)
   {
       return Response::json($CellierBouteille);
   }


    /**
     * Enregistre une bouteille dans un cellier
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
   {
       return Response::json(CellierBouteille::create($request->all()), 201);
   }


    /**
     * Modifie une bouteille dans un cellier
     * @param Request $request
     * @param CellierBouteille $CellierBouteille
     * @return JsonResponse
     */
    public function update(Request $request, CellierBouteille $CellierBouteille)
   {
       return Response::json($CellierBouteille->update($request->all()), 200);
   }


    /**
     * Supprime une bouteille dans un cellier
     * @param CellierBouteille $CellierBouteille
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(CellierBouteille $CellierBouteille)
   {
       $CellierBouteille->delete();

       return Response::json(null, 204);
   }
}
