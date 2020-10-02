<?php

namespace App\Http\Controllers;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\AffichageDetailsTransactionBouteilleTypeControllerResource;



/**
 * Gère l'API transactions
 * @package App\Http\Controllers
 */
class AffichageDetailsTransactionBouteilleTypeController extends Controller
{
  
    public function index()
    {
        return DB::table('transactions')
                    ->join('bouteilles', 'bouteilles.id', '=', 'transactions.bouteille_id')
                    ->join('types', 'bouteilles.type_id', '=', 'types.id')
                    ->select('*')
                    ->get();
    }

    public function show($request)
    {
        //return TransactionResource::collection(Transaction::where('cellier_id','=', $request)->get());
        return DB::table('transactions')
        ->join('bouteilles', 'bouteilles.id', '=', 'transactions.bouteille_id')
        ->join('types', 'bouteilles.type_id', '=', 'types.id')
        ->select('*')
        ->where('cellier_id','=',$request)
        ->get();
    }
    
}
