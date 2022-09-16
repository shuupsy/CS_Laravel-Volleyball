<?php

namespace App\Models;

use App\Models\Joueur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;

    public function joueur() {
        return $this->hasOne(Joueur::class);
    }
}
