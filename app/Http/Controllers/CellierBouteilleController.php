<?php

namespace App\Http\Controllers;

use App\Cellier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\CellierBouteille;

class CellierBouteilleController extends Controller
{
    public function index($Cellier) {

        return Response::json(CellierBouteille::all());
    }

  

   public function show(CellierBouteille $CellierBouteille)
   {
       return Response::json($CellierBouteille);
   }

  
   public function store(Request $request)
   {
       return Response::json(CellierBouteille::create($request->all()), 201);
   }

 
   public function update(Request $request, CellierBouteille $CellierBouteille)
   {
       return Response::json($CellierBouteille->update($request->all()), 200);
   }
  

   public function destroy(CellierBouteille $CellierBouteille)
   {
       $CellierBouteille->delete();

       return Response::json(null, 204);
   }
}
