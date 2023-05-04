<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    protected $table = 'port';
    protected $fillable = ['id', 'nom'];
    public $timestamps = false;

}
