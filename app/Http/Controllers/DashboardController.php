<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrato;
use App\Pasajero;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      return view('dashboard.index');
    }

    public function exportColegios($value='')
    {
      \Excel::create('Contratos', function($excel) {

        $users = Contrato::all();

        $excel->sheet('Users', function($sheet) use($users) {
        $sheet->row(1, [
            'Año', 'Destino', 'Establecimiento',
            'Total', 'Pagado', 'Deuda'
        ]);

      foreach($users as $index => $user) {
          $sheet->row($index+2, [
              $user->fechav_contrato,
              $user->destino_contrato,
              $user->establecimiento_contrato,
              $user->total,
              $user->pagado,
              $user->deuda,
            ]);
      }

    });

    })->export('xlsx');
    }
}
