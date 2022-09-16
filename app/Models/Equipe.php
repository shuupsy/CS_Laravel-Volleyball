<?php

namespace App\Models;

use App\Models\Joueur;
use App\Models\Continent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = ['continent_id', 'nom_equipe', 'ville', 'pays', 'nb_joueurs_max'];

    public function continent() {
        return $this->belongsTo(Continent::class);
    }
    public function joueurs() {
        return $this->hasMany(Joueur::class);
    }
}
