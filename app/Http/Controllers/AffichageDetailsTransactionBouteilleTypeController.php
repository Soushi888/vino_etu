<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionResource;
use App\Transaction;
use Illuminate\Support\Facades\DB;



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
                    ->join('types', 'types.id', '=', 'bouteilles.type_id')
                    ->select('*')
                    ->get();
    }

    public function show($request)
    {
        
        //return TransactionResource::collection(Transaction::where('cellier_id','=', $request)->get());

        return DB::table('transactions')
        ->join('bouteilles', 'bouteilles.id', '=', 'transactions.bouteille_id')
        ->join('types', 'types.id', '=', 'bouteilles.type_id')
        ->select('*')
        ->where('cellier_id','=',$request)
        ->get();
    }
}
