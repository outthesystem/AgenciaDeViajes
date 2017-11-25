<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/angular.min.js') }}"></script>
    <script src="{{ asset('js/searchcontratos.js') }}"></script>
    <script src="{{ asset('js/jquery-editable-select.js') }}"></script>
    <script src="{{ asset('js/ui-bootstrap-tpls-2.5.0.min.js') }}"></script>

    <script src="{{ asset('js/contratos_pasajeros.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-editable-select.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<script type="text/javascript">
  window.print();
</script>

<style media="screen">

.color-invoice{
  background-color: #ffffff;
}
</style>

<div class="row color-invoice">
      <div class="col-md-12">
        <div class="row">
          <div class="col-lg-7 col-md-7 col-sm-7">
              <h4>AGENCIA DE VIAJES Y TURISMO</h4>
            <img src="{{ asset('img/logo.png') }}" alt="">
            <br />
            <strong>Pico Truncado:</strong> Alem
            560 Tel: (0297) 4991177 | <strong>Caleta Olivia: (casa central)</strong>
            Alsina 411 Tel/Fax: (0297) 4859550 / 4854979
            <br />
            <strong>Rio Turbio:</strong> Tte Del Castillo 258 Local 2 Tel: (02902) 422778
            | <strong>Rio Gallegos - Santa Cruz</strong> Av. Roca 1074 - Local 14 - Tel: (02966) 437684

            | <strong>Comodoro Rivadavia - Chubut:</strong> San Martin 263 - Gal. San Martin Local 36 - Tel: (0297) 4460460
            <br> Casa Matriz: Simon Bolivar 88 Tel/Fax: (0297) 4974694 Leg. 9326 - Exp 357/96 - Disp 1217 E-Mail: menditur@mcolivia.com.ar Las Heras Santa Cruz
            <br>
            <center>
              <strong>IVA RESPONSABLE INSCRIPTO</strong>
              </center>
            </div>
          <div class="col-lg-5 col-md-5 col-sm-5">
            <br>
            <br>
            <h2>   Recibo No: {{$pago->id}}</h2> DOCUMENTO NO VALIDO COMO FACTURA
            <br> <b>Fecha:</b> {{ date('d/m/y', strtotime($pago->created_at)) }}
            <br> CUIT: 30-67375981-1 - Ing Brutos: 09-1356
            <br> Inicio de actividad: 07/1996
          </div>
        </div>
        <hr />
        <div class="row">
          <div class="col-lg-7 col-md-7 col-sm-7">
            <h5>{{$pasajero->nombre_pasajero}} </h5> {{$pasajero->direccion_pasajero}} -  {{$pasajero->localidad_pasajero}},
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5">
            <h3>Contacto :</h3>
            Telefono: {{$pasajero->telefono_pasajero}}
          </div>
        </div>
        <hr />
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <strong>Liquidacion de Pago :</strong>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Recibo</th>
                    <th>Fecha</th>
                    <th>Importe</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$pago->id}}</td>
                    <td>{{$pago->created_at}}</td>
                    <td>${{number_format($pago->total_pago, 2)}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <hr>
          La cantidad de pesos ${{number_format($pago->total_pago, 2)}} En ...........................................................................................
          Banco:....................................................................................................
          <br>En concepto de:..............................................................................................................................
          </div>
        </div>
        <div class="row">
        </div>
        <hr />
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <h1>Son ${{number_format($pago->total_pago, 2)}}</h1>
            <div class="pull-right">
            <center>
              <strong>................................................................<br>
              Firma Autorizada</strong>
            </center>

            </div>
          </div>
        </div>

        <hr>
        <div class="row">
        </div>
      </div>
    </div>
