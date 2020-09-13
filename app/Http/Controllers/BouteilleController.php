<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Bouteille;

/**
 * Gère les routes de l'API bouteilles
 * @package App\Http\Controllers
 */
class BouteilleController extends Controller
{
    /**
     * Retournes toutes les bouteilles de la BDD
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {

        return Response::json(Bouteille::all());
    }


    /**
     * Retourne une bouteille de la BDD
     * @param Bouteille $bouteille
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Bouteille $bouteille)
   {
       return Response::json($bouteille);
   }


    /**
     * Enregistre une bouteille dans la BDD
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
   {
       return Response::json(Bouteille::create($request->all()), 201);
   }


    /**
     * Modifie une bouteille dans la BDD
     * @param Request $request
     * @param Bouteille $bouteille
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Bouteille $bouteille)
   {
       return Response::json($bouteille->update($request->all()), 200);
   }


    /**
     * Supprime une bouteille dans la BDD
     * @param Bouteille $bouteille
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Bouteille $bouteille)
   {
       $bouteille->delete();

       return Response::json(null, 204);
   }
}

