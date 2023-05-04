<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liaison extends Model
{
    protected $table = 'liaison';
    protected $fillable = ['code', 'distance', 'id_secteur', 'id_port1', 'id_port2', 'id_bateau'];
    public $timestamps = false;

    public function secteur()
    {
        return $this->belongsTo(Secteur::class, 'id_secteur');
    }
    public function port1()
    {
        return $this->belongsTo(Port::class, 'id_port1');
    }

    public function port2()
    {
        return $this->belongsTo(Port::class, 'id_port2');
    }

    public function bateau()
    {
        return $this->belongsTo(Bateau::class, 'id_bateau');
    }

}
