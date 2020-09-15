<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\User;
use App\Cellier;

class UserController extends Controller
{
    /**
     * Retourne toutes les utilisateurs
     * @return JsonResponse
     */
    public function index()
    {

        return Response::json(User::all());
    }


    /**
     * Retourne un utilisateur
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user)
    {
        return Response::json($user);
    }

    /**
     * Retourne les celliers d'un utilisateur
     * @param User $user
     * @return User
     */
    public function showCelliers(User $user)
    {

        return Response::json(Cellier::where("user_id", $user->id)->get());
    }

    /**
     * Enregistre un cellier
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return Response::json(User::create($request->all()), 201);
    }


    /**
     * Modifie un utilisateur
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(Request $request, User $user)
    {
        return Response::json($user->update($request->all()), 200);
    }


    /**
     * Supprime un cellier
     * @param User $user
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return Response::json("Utilisateur supprimé avec succès.", 204);
    }
}
