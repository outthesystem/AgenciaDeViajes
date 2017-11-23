<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Pasajero;
use DB;

class ContratosController extends Controller
{
    public function index()
    {
      $contratos = Contrato::all();

      return view('contrato.index', compact('contratos'));
    }

    public function create()
    {
      return view('contrato.create');
    }

    public function store(Request $request)
    {
        $contrato = new Contrato([
          'nombre_contrato' => $request->get('nombre_contrato'),
          'programa_contrato' => $request->get('programa_contrato'),
          'fechav_contrato' => $request->get('fechav_contrato')
        ]);
        $contrato->save();

        return redirect('contrato/'.$contrato->id);
    }

    public function show(Contrato $contrato)
    {
      return view('contrato.show', compact('contrato'));
    }

    public function storePas(Request $request)
    {
      $pasajero = new Pasajero([
        'id_contrato' => $request->get('id_contrato'),
        'nombre_pasajero' => $request->get('nombre_pasajero'),
        'dni_pasajero' => $request->get('dni_pasajero'),
        'fechanac_pasajero' => $request->get('fechanac_pasajero'),
        'total_viaje' => $request->get('total_viaje'),
        'cuotas' => $request->get('cuotas'),
        'total_cuotas' => $request->get('total_cuotas'),
        'cuotas_pagadas' => $request->get('cuotas_pagadas'),
        'saldo_favor' => $request->get('saldo_favor'),
        'total_restante' => $request->get('total_restante')
      ]);

      $pasajero->save();

      return redirect('contrato/'.$request->get('id_contrato'));

    }
    public function getpasajeros($id)
    {

      $pasajeros = Contrato::find($id)->pasajero;

      header('Content-Type: application/json');
      echo json_encode($pasajeros);
    }
}
