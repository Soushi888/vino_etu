<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Cellier;


/**
 * Gère l'API celliers
 * @package App\Http\Controllers
 */
class CellierController extends Controller
{
    /**
     * Retourne toutes les celliers
     * @return JsonResponse
     */
    public function index() {

        return Response::json(Cellier::all());
    }


    /**
     * Retourne un cellier
     * @param Cellier $cellier
     * @return JsonResponse
     */
    public function show(Cellier $cellier)
   {
       return Response::json($cellier);
   }


    /**
     * Enregistre un cellier
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
   {
       return Response::json(Cellier::create($request->all()), 201);
   }


    /**
     * Modifie un cellier
     * @param Request $request
     * @param Cellier $cellier
     * @return JsonResponse
     */
    public function update(Request $request, Cellier $cellier)
   {
       return Response::json($cellier->update($request->all()), 200);
   }


    /**
     * Supprime un cellier
     * @param Cellier $cellier
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Cellier $cellier)
   {
       $cellier->delete();

       return Response::json("Cellier supprimé avec succès.", 204);
   }
}
