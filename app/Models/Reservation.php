<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $table = 'reservation'; // nom de la table dans la base de données

    protected $fillable = ['num','nom',	'adresse', 'codePostal', 'ville', 'num_traversee'];

    public $timestamps = false;

}
