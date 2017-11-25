<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasajero;
use App\Contrato;

class PasajerosController extends Controller
{

  public function SearchData()
  {
    $pasajeros = Pasajero::all();

    header('Content-Type: application/json');
    echo json_encode($pasajeros);
  }

}
