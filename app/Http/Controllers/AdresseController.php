<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Adresse;

/**
 * Gère les routes de l'API adresses
 * @package App\Http\Controllers
 */
class AdresseController extends Controller
{
    /**
     * Retourne toutes les adresses de la BDD au format JSON
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        return Response::json(Adresse::all());
    }


    /**
     * Retourne une adresse de la BDD au format JSON
     * @param Adresse $adresse
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Adresse $adresse)
    {
        return Response::json($adresse);
    }


    /**
     * Enregistre une adresse dans la BDD
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return Response::json(Adresse::create($request->all()), 201);
    }


    /**
     * Modifie une adresse dans la BDD
     * @param Request $request
     * @param Adresse $adresse
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Adresse $adresse)
    {
        return Response::json($adresse->update($request->all()), 200);
    }


    /**
     * Supprime une adresse de la BDD
     * @param Adresse $adresse
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Adresse $adresse)
    {
        $adresse->delete();

        return Response::json(null, 204);
    }
}
