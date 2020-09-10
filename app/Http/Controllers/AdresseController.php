<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Adresse;

class AdresseController extends Controller
{
    public function index() {

        return Response::json(Adresse::all());
    }

  

   public function show(Adresse $adresse)
   {
       return Response::json($adresse);
   }

  
   public function store(Request $request)
   {
       return Response::json(Adresse::create($request->all()), 201);
   }

 
   public function update(Request $request, Adresse $adresse)
   {
       return Response::json($adresse->update($request->all()), 200);
   }
  

   public function destroy(Adresse $adresse)
   {
       $adresse->delete();

       return Response::json(null, 204);
   }
}
