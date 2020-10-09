<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'bouteille_id', 'cellier_id', 'quantite', 'date_achat', 'garde_jusqua', "notes", "prix", 'millesime'
    ];

    public function cellier()
    {
        return $this->belongsTo(Cellier::class);
    }

    public function bouteille()
    {
        return $this->belongsTo(Bouteille::class);
    }
}