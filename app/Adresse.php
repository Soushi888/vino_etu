<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    // $fillable donne l'authorisation d'envoyer en groupe les données
    protected $fillable = [
        'rue', 'ville', 'pays', 'cp'
    ];
}
