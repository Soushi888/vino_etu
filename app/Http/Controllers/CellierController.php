<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;
use App\Cellier;
use App\Http\Resources\CellierResource;
use Illuminate\Support\Facades\Validator;


/**
 * Gère l'API celliers
 * @package App\Http\Controllers
 */
class CellierController extends Controller
{
    /**
     * Retourne toutes les celliers
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CellierResource::collection(Cellier::all());
    }


    /**
     * Retourne un cellier
     * @param Cellier $cellier
     * @return CellierResource
     */
    public function show(Cellier $cellier)
    {
        return new CellierResource($cellier);
    }


    /**
     * Enregistre un cellier
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nom" => "string|required",
            "user_id" => "integer"
        ]);

        if ($validator->passes()) {
            return response()->json(Cellier::create($request->all()), 200);
        }

        return response()->json(['erreur' => $validator->errors()->all()]);
    }


    /**
     * Modifie un cellier
     * @param Request $request
     * @param Cellier $cellier
     * @return JsonResponse
     */
    public function update(Request $request, Cellier $cellier)
    {
        $validator = Validator::make($request->all(), [
            "nom" => "string|required",
            "user_id" => "integer"
        ]);

        if ($validator->passes()) {
            return response()->json($cellier->update($request->all()), 200);
        }

        return response()->json(['erreur' => $validator->errors()->all()]);
    }


    /**
     * Supprime un cellier
     * @param Cellier $cellier
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Cellier $cellier)
    {

        if ($cellier->delete())
            return Response::json("null", 204);
    }
}
