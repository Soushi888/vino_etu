<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Response;

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
        return TransactionResource::collection(Transaction::where('cellier_id', request('cellier'))->get());
        
    }


    /**
     * Retourne les transactions liées à une bouteille d'un cellier
     * @return AnonymousResourceCollection
     */
    public function show()
    {
        return TransactionResource::collection(Transaction::where('bouteille_id', request('bouteille'))->where('cellier_id', request("cellier"))->get());
    }


    /**
     * Enregistre une transaction liée à une bouteille dans un cellier
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return Response::json(TransactionController::store($request))->original;
    }
 
}
