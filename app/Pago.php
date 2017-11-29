<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Pago extends Model
{
   use HasRoles;

    protected $fillable = [
      'id_contrato',
      'id_pasajero',
      'cuotas',
      'total_pago',
      'usuario',
      'observaciones',
    ];
}
