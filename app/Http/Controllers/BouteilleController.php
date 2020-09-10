<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Bouteille;

class BouteilleController extends Controller
{
    public function index() {

        return Response::json(Bouteille::all());
    }

  

   public function show(Bouteille $bouteille)
   {
       return Response::json($bouteille);
   }

  
   public function store(Request $request)
   {
       return Response::json(Bouteille::create($request->all()), 201);
   }

 
   public function update(Request $request, Bouteille $bouteille)
   {
       return Response::json($bouteille->update($request->all()), 200);
   }
  

   public function destroy(Bouteille $bouteille)
   {
       $bouteille->delete();

       return Response::json(null, 204);
   }
}

