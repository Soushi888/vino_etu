<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Transaction;
use Exception;
use Illuminate\Http\JsonResponse as JsonResponseAlias;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

/**
 * Gère l'API transactions
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{
    /**
     * Retourne toutes les transactions liées aux bouteilles.
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return TransactionResource::collection(Transaction::all());
    }


    /**
     * Retourne une transaction liée à une bouteille.
     * @param Transaction $transaction
     * @return TransactionResource
     */
    public function show(Transaction $transaction)
    {
            return new TransactionResource($transaction);
    }


    /**
     * Enregistre une transaction liée à une bouteille dans un cellier
     * @param Request $request
     * @return JsonResponseAlias
     */
    public static function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "bouteille_id" => "integer|required",
            "cellier_id" => "integer|required",
            "quantite" => "integer|required",
            "date_achat" => "date",
            "garde_jusqua" => "date",
            "notes" => "string",
            "prix" => "numeric",
            "millesime" => "integer"
        ]);

        if ($validator->passes()) {
            return response()->json(Transaction::create($request->all()), 200);
        }

        return response()->json(['erreur' => $validator->errors()->all()], 422);
    }

    /**
     * Modifie une transaction liée à une bouteille dans un cellier
     * @param Transaction $transaction
     * @param Request $request
     * @return JsonResponseAlias
     */
    public function update(Transaction $transaction, Request $request)
    {
        $validator = Validator::make($request->all(), [
            "bouteille_id" => "integer|required",
            "cellier_id" => "integer|required",
            "quantite" => "integer|required",
            "date_achat" => "date",
            "garde_jusqua" => "date",
            "notes" => "string",
            "prix" => "numeric",
            "millesime" => "integer"
        ]);

        if ($validator->passes()) {
            return Response::json($transaction->update($request->all()), 200);
        }

        return response()->json(['erreur' => $validator->errors()->all()], 422);
    }


    /**
     * Supprime une transaction liée à une bouteille dans un cellier
     * @param Transaction $transaction
     * @return JsonResponseAlias
     * @throws Exception
     */
    public function destroy(Transaction $transaction)
    {
        if ($transaction->delete()) {
            return Response::json(null, 204);
        }
    }
}
