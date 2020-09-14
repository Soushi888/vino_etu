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
    public function index($Cellier)
    {
        $bouteilles = CellierBouteille::where('cellier_id', request('cellier'))->get();

        return Response::json($bouteilles);
    }


    /**
     * Retourne une bouteille d'un cellier
     * @param CellierBouteille $CellierBouteille
     * @return JsonResponse
     */
    public function show(CellierBouteille $CellierBouteille)
    {
        $bouteille = CellierBouteille::where('cellier_id', request('cellier'))->where('id', request('bouteille'))->get();


        return Response::json($bouteille);
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
        $bouteille = CellierBouteille::where('cellier_id', request('cellier'))->where('bouteille_id', request('bouteille'))->get();

        return Response::json($bouteille->update($request->all()), 200);
    }


    /**
     * Supprime une bouteille dans un cellier
     * @param CellierBouteille $CellierBouteille
     * @return JsonResponse
     * @throws \Exception
     */
    public
    function destroy(CellierBouteille $CellierBouteille)
    {
        $CellierBouteille->delete();

        return Response::json(null, 204);
    }
}
