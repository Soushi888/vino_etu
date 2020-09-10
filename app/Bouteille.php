<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    // $fillable donne l'authorisation d'envoyer en groupe les données
    protected $fillable = [
        'nom', 'image', 'code_saq', "pays",  "description", 'prix_saq', 'url_saq', "image_url","format","type_id"
    ];
}
