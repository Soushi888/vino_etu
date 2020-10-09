<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    // $fillable donne l'authorisation d'envoyer en groupe les données
    protected $fillable = [
        'nom', 'code_saq', "pays",  "description", 'prix_saq', 'url_saq', "url_image","format","type_id"
    ];

    public function celliers() {
        return $this->belongsToMany(Cellier::class);
    }

}