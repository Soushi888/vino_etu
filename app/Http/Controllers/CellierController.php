<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Cellier;


/**
 * Gère l'API cellierscellier
 * @package App\Http\Controllers
 */
class CellierController extends Controller
{
    /**
     * Retourne toutes les celliers
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {

        return Response::json(Cellier::all());
    }


    /**
     * Retourne un cellier
     * @param Cellier $cellier
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Cellier $cellier)
   {
       return Response::json($cellier);
   }


    /**
     * Enregistre un cellier
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
   {
       return Response::json(cellier::create($request->all()), 201);
   }


    /**
     * Modifie un cellier
     * @param Request $request
     * @param Cellier $cellier
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Cellier $cellier)
   {
       return Response::json($cellier->update($request->all()), 200);
   }


    /**
     * Supprime un cellier
     * @param Cellier $cellier
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Cellier $cellier)
   {
       $cellier->delete();

       return Response::json(null, 204);
   }
}
