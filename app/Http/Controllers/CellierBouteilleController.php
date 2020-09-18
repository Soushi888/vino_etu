<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Requestid;
use Illuminate\Http\Request;
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
     * Retourne toutes les bouteilles d'un cellier.
     * @param $Cellier
     * @return JsonResponse
     */
    public function index()
    {
        return CellierBouteilleResource::collection(CellierBouteille::where('cellier_id', request('cellier'))->get());
        // $bouteilles = CellierBouteille::where('cellier_id', request('cellier'))->get();

        // return Response::json($bouteilles);
    }


    /**
     * Retourne une bouteille d'un cellier
     * @param CellierBouteille $CellierBouteille
     * @return JsonResponse
     */
    public function show(CellierBouteille $CellierBouteille)
    {

        return CellierBouteilleResource::collection(CellierBouteille::where('bouteille_id', request('bouteille'))->get());

        // $bouteille = CellierBouteille::where('cellier_id', request('cellier'))->where('id', request('bouteille'))->get();
        // return Response::json($bouteille);
    }


    /**
     * Enregistre une bouteille dans un cellier
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

        //  return Response::json(CellierBouteille::create($request->all()), 201);
    }


    /**
     * Modifie une bouteille dans un cellier
     * @param Request $request
     * @param CellierBouteille $CellierBouteille
     * @return JsonResponse
     */
    public function update(Request $request, CellierBouteille $CellierBouteille)
    {

        // $validator = Validator::make($request->all(), [
        //     "bouteille_id" => "integer|required",
        //     "cellier_id" => "integer|required",
        //     "quantite" => "integer",
        //     "date_achat" => "date",
        //     "garde_jusqua" => "date",
        //     "notes" => "string",
        //     "prix" => "numeric",
        //     "millesime" => "integer"
        // ]);

        // if ($validator->passes()) {

        //     $CellierBouteille = CellierBouteille::where('id', request('cellierBouteille'));
        //     return Response::json($CellierBouteille->update($request->all()), 200);
           
        // }
    
        // return response()->json(['erreur' => $validator->errors()->all()]); 

        $bouteille = CellierBouteille::where('cellier_id', request('cellier'))->where('bouteille_id', request('bouteille'));

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
        // if ($CellierBouteille->delete())
        //     return Response::json("null", 204);
        
        $CellierBouteille = CellierBouteille::where('id', request('cellierBouteille'));
        $CellierBouteille->delete();
        return Response::json(null, 204);
    }
}
