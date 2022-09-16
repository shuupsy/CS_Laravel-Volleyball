<?php

namespace App\Models;

use App\Models\Role;
use App\Models\Photo;
use App\Models\Equipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Joueur extends Model
{
    use HasFactory;

    protected $fillable = ['nom_joueur', 'prenom_joueur', 'age', 'telephone', 'mail', 'genre', 'pays_origine', 'role_id', 'equipe_id' ,'photo_id'];

    public function equipe() {
        return $this->belongsTo(Equipe::class);
    }

    public function photo() {
        return $this->belongsTo(Photo::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }
}
