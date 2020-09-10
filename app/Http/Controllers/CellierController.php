<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Cellier;


class CellierController extends Controller
{
    public function index() {

        return Response::json(Cellier::all());
    }

  

   public function show(Cellier $cellier)
   {
       return Response::json($cellier);
   }

  
   public function store(Request $request)
   {
       return Response::json(cellier::create($request->all()), 201);
   }

 
   public function update(Request $request, Cellier $cellier)
   {
       return Response::json($cellier->update($request->all()), 200);
   }
  

   public function destroy(Cellier $cellier)
   {
       $cellier->delete();

       return Response::json(null, 204);
   }
}
