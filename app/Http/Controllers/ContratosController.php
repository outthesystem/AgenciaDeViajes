<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Pasajero;
use Notify;

class ContratosController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

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
          'destino_contrato' => $request->get('destino_contrato'),
          'establecimiento_contrato' => $request->get('establecimiento_contrato'),
          'fechav_contrato' => $request->get('fechav_contrato'),
          'usuario' => $request->get('usuario'),
          'observaciones' => $request->get('observaciones')
        ]);
        $contrato->save();

        Notify::success('', $title = 'Datos creados correctamente', $options = []);

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
        'telefono_pasajero' => $request->get('telefono_pasajero'),
        'direccion_pasajero' => $request->get('direccion_pasajero'),
        'localidad_pasajero' => $request->get('localidad_pasajero'),
        'nombre_resp' => $request->get('nombre_resp'),
        'telefono_resp' => $request->get('telefono_resp'),
        'localidad_resp' => $request->get('localidad_resp'),
        'direccion_resp' => $request->get('direccion_resp'),
        'nombre_resp1' => $request->get('nombre_resp1'),
        'telefono_resp1' => $request->get('telefono_resp1'),
        'localidad_resp1' => $request->get('localidad_resp1'),
        'direccion_resp1' => $request->get('direccion_resp1'),
        'total_viaje' => $request->get('total_viaje'),
        'cuotas' => $request->get('cuotas'),
        'total_cuotas' => $request->get('total_cuotas'),
        'cuotas_pagadas' => $request->get('cuotas_pagadas'),
        'saldo_favor' => $request->get('saldo_favor'),
        'total_restante' => $request->get('total_restante'),
        'confirmado' => $request->get('confirmado'),
        'usuario' => $request->get('usuario')
      ]);

      $pasajero->save();

      $contrato = Contrato::find($request->get('id_contrato'));

      $total = $contrato->total + $pasajero->total_viaje;

      $pagado = $contrato->pagado + $pasajero->saldo_favor;

      $deuda = $contrato->deuda + $pasajero->total_restante;

      Contrato::find($request->get('id_contrato'))
      ->update([
        'total' => $total,
        'pagado' => $pagado,
        'deuda' => $deuda
      ]);

      Notify::success('', $title = 'Pasajeros agregado correctamente', $options = []);


      return redirect('contrato/'.$request->get('id_contrato'));

    }
    public function getpasajeros($id)
    {

      $pasajeros = Contrato::find($id)->pasajero;

      header('Content-Type: application/json');
      echo json_encode($pasajeros);
    }

    public function SearchData(Request $request)
    {
      $contratos = Contrato::all();

      header('Content-Type: application/json');
      echo json_encode($contratos);
    }
}
