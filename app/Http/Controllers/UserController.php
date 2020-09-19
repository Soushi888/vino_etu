<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\User;
use App\Cellier;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CellierResource;

class UserController extends Controller
{
    /**
     * Retourne toutes les utilisateurs
     * @return JsonResponse
     */
    public function index()
    {

        return UserResource::collection(User::all());
    }


    /**
     * Retourne un utilisateur
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user)
    {
        return new UserResource($user);
        // return Response::json($user);
    }

    /**
     * Retourne les celliers d'un utilisateur
     * @param User $user
     * @return User
     */
    public function showCelliers(User $user)
    {
        // return response(Cellier::where("user_id", $user->id)->get());
        return new CellierResource(Cellier::where("user_id", $user->id)->get());
    }

    /**
     * Enregistre un cellier
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "string|required",
            "prenom" => "string",
            "email" => "email|required",
            "email_verified_at" => "string",
            "type" => "string|required"
        ]);

        if ($validator->passes()) {
            return response()->json(User::create($request->all()), 200);
        }

        return response()->json(['erreur' => $validator->errors()->all()], 422);
    }


    /**
     * Modifie un utilisateur
     * @param Request $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            "name" => "string|required",
            "prenom" => "string",
            "email" => "email|required",
            "email_verified_at" => "string",
            "type" => "string|required"
        ]);

        if ($validator->passes()) {
            return response()->json($user->update($request->all()), 200);
        }

        return response()->json(['erreur' => $validator->errors()->all()], 422);
    }


    /**
     * Supprime un cellier
     * @param User $user
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(User $user)
    {

        if ($user->delete())
        return Response::json("null", 204);
    }
}
