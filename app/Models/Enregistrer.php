<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Enregistrer extends Model
{
    protected $table = 'enregistrer'; // nom de la table dans la base de données

    protected $fillable = ['lettre_type','num_type', 'num_reservation', 'quantite',];

    public $timestamps = false;

}
