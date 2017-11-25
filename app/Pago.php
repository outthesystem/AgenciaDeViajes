<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable = [
      'id_contrato',
      'id_pasajero',
      'cuotas',
      'total_pago',
      'usuario',
      'observaciones',
    ];
}
