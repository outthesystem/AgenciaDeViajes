<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Pasajero;
use App\Pago;

class PagosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $pasajeros = Pasajero::all();

      return view('pago.index', compact('pasajeros'));
    }

    public function AddPago($id)
    {
      $pasajero = Pasajero::find($id);
      $pasajeror = Pasajero::find($id)->pagos;

      $contrato = Contrato::find($pasajero->id_contrato);

      return view('pago.addpago', compact('pasajero', 'contrato', 'pasajeror'));
    }

    public function SearchData($id)
    {
      $pasajero = Pasajero::find($id)->pagos;

      header('Content-Type: application/json');
      echo json_encode($pasajero);
    }

    public function PagoStore(Request $request)
    {
      $p = Pasajero::find($request->get('id_pasajero'));

      $cuotas_old = $request->get('cuotas');
      $cuotas_new = $p->cuotas - $cuotas_old;

      $cuotas_pagadas_o = $p->cuotas_pagadas;
      $cuotas_pagadas_n = $cuotas_pagadas_o + $request->get('cuotas');

      $saldo_favor_o = $p->saldo_favor;
      $saldo_favor_n = $request->get('total_pago') + $saldo_favor_o;

      $saldo_restante_o = $request->get('total_pago');
      $saldo_restante_n = $p->total_restante - $saldo_restante_o;

      $pasajero = Pasajero::find($request->get('id_pasajero'))
      ->update([
        'cuotas' => $cuotas_new,
        'cuotas_pagadas' => $cuotas_pagadas_n,
        'saldo_favor' => $saldo_favor_n,
        'total_restante' => $saldo_restante_n
      ]);

      $pagos = new Pago([
        'id_contrato' => $request->get('id_contrato'),
        'id_pasajero' => $request->get('id_pasajero'),
        'cuotas' => $request->get('cuotas'),
        'total_pago' => $request->get('total_pago'),
        'usuario' => $request->get('usuario')
      ]);

      $pagos->save();

      $contrato = Contrato::find($request->get('id_contrato'));

      $pagado = $contrato->pagado + $saldo_favor_n;

      $deuda = $contrato->deuda - $request->get('total_pago');;

      Contrato::find($request->get('id_contrato'))
      ->update([
        'pagado' => $pagado,
        'deuda' => $deuda
      ]);

      return redirect('addpago/'.$p->id);

    }

    public function ImprimirPago($id)
    {
      $pago = Pago::find($id);
      $pasajero = Pasajero::find($id);

      $contrato = Contrato::find($pasajero->id_contrato);

      return view('pago.imprimir', compact('pago', 'pasajero', 'contrato'));
    }
}
