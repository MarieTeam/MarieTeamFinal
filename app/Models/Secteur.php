<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    protected $table = 'secteur';
    protected $fillable = ['id', 'nom'];
    public $timestamps = false;
}
