<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Requestid;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;
use App\CellierBouteille;
use App\Http\Resources\CellierBouteilleResource;
use Illuminate\Support\Facades\Validator;

/**
 * Gère l'API celliers/bouteilles
 * @package App\Http\Controllers
 */
class CellierBouteilleController extends Controller
{
    /**
     * Retourne toutes les transactions liées aux bouteilles d'un cellier.
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CellierBouteilleResource::collection(CellierBouteille::where('cellier_id', request('cellier'))->get());
    }

    /**
     * Retourne les transactions liées à une bouteille d'un cellier
     * @return AnonymousResourceCollection
     */
    public function show()
    {
        return CellierBouteilleResource::collection(CellierBouteille::where('bouteille_id', request('bouteille'))->where('cellier_id', \request("cellier"))->get());
    }

    /**
     * Retourne une transaction liée à une bouteille.
     * @param CellierBouteille $cellierBouteille
     * @return CellierBouteilleResource
     */
    public function showTransaction(CellierBouteille $cellierBouteille)
    {
        return new CellierBouteilleResource($cellierBouteille->find(request("transaction")));
    }


    /**
     * Enregistre une transaction liée à une bouteille dans un cellier
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "bouteille_id" => "integer|required",
            "cellier_id" => "integer|required",
            "quantite" => "integer",
            "date_achat" => "date",
            "garde_jusqua" => "date",
            "notes" => "string",
            "prix" => "numeric",
            "millesime" => "integer"
        ]);

        if ($validator->passes()) {
            return response()->json(CellierBouteille::create($request->all()), 200);
        }

        return response()->json(['erreur' => $validator->errors()->all()]);
    }

    /**
     * Modifie une transaction liée à une bouteille dans un cellier
     * @param Request $request
     * @return JsonResponse
     */
    public function updateTransaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "bouteille_id" => "integer|required",
            "cellier_id" => "integer|required",
            "quantite" => "integer",
            "date_achat" => "date",
            "garde_jusqua" => "date",
            "notes" => "string",
            "prix" => "numeric",
            "millesime" => "integer"
        ]);

        if ($validator->passes()) {
            //  return response()->json($CellierBouteille->update($request->all()), 200);

            $bouteille = CellierBouteille::where('id', request('transaction'));
            return Response::json($bouteille->update($request->all()), 200);
        }

        return response()->json(['erreur' => $validator->errors()->all()]);
    }


    /**
     * Supprime une transaction liée à une bouteille dans un cellier
     * @return JsonResponse
     * @throws Exception
     */
    public function destroyTransaction()
    {
        $CellierBouteille = CellierBouteille::where('id', request('transaction'));

        if ($CellierBouteille->delete())
            return Response::json(null, 204);
    }
}
