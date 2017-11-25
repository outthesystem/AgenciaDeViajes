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
      'telefono_pasajero',
      'localidad_pasajero',
      'direccion_pasajero',
      'nombre_resp',
      'telefono_resp',
      'localidad_resp',
      'direccion_resp',
      'nombre_resp1',
      'telefono_resp1',
      'localidad_resp1',
      'direccion_resp1',
      'total_viaje',
      'cuotas',
      'total_cuotas',
      'cuotas_pagadas',
      'saldo_favor',
      'total_restante',
      'confirmado',
      'usuario',
      'observaciones',
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
