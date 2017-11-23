<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = [
      'nombre_contrato',
      'programa_contrato',
      'fechav_contrato',
    ];

    public function pasajero()
    {
        return $this->hasMany('App\Pasajero', 'id_contrato');
    }
}
