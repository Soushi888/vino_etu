<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cellier extends Model
{
    // $fillable donne l'authorisation d'envoyer en groupe les données
    protected $fillable = [
        'id', 'nom', 'user_id', "adresse_id"
    ];

    public function bouteilles() {
        return $this->belongsToMany(Bouteille::class);
    }
}
