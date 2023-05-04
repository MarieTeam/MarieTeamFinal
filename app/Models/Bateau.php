<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bateau extends Model
{
    protected $table = 'bateau'; // nom de la table dans la base de données
    protected $fillable = ['id', 'nom']; // colonnes pouvant être mass-assignées
    public $timestamps = false;

}
