<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    protected $table = 'type';
    protected $primaryKey = ['lettre', 'num'];
    public $incrementing = false;
    public $timestamps = false;
}
