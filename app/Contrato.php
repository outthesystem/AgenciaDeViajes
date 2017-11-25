<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = [
      'nombre_contrato',
      'programa_contrato',
      'destino_contrato',
      'establecimiento_contrato',
      'fechav_contrato',
      'usuario',
      'observaciones',
      'total',
      'pagado',
      'deuda',
    ];

    public function pasajero()
    {
        return $this->hasMany('App\Pasajero', 'id_contrato');
    }
    public function pasa()
    {
        return $this->hasOne('App\Pasajero', 'id_contrato');
    }
}
