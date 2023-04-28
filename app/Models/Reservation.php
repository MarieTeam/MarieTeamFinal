<?php

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $table = 'Reservation'; // nom de la table dans la base de données

    protected $fillable = ['num','nom',	'adresse', 'codePostal', 'ville', 'num_traversee'];

}
