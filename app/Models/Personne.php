<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $table = 'personnes';
    protected $fillable = ['id', 'nom', 'addresse','code_postal','ville','type_id'];
    public $timestamps = false;

}
