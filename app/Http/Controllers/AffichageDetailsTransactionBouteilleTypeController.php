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
                    ->select('bouteilles.nom')
                    ->get();
    }
}
