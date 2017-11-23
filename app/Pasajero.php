<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasajero extends Model
{
    protected $fillable = [
      'id_contrato',
      'nombre_pasajero',
      'dni_pasajero',
      'fechanac_pasajero',
      'total_viaje',
      'cuotas',
      'total_cuotas',
      'cuotas_pagadas',
      'saldo_favor',
      'total_restante'
    ];

    public function pagos()
    {
        return $this->hasMany('App\Pago', 'id_pasajero', 'id');
    }

    public function contratos()
    {
        return $this->hasMany('App\Contrato', 'id_pasajero', 'id');
    }
}
