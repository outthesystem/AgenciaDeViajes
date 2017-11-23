@extends('layouts.app')

@section('content')
<style>
.match {
  background: #3C8DBC;
  color: #fff;
  font-weight: bold;
}
</style>

<script type="text/javascript">
  var id_contract = {{$contrato->id}}
</script>

<div ng-app="contratos_pasajeros" ng-controller="ctrlpasajeros" class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="btn-group btn-group-sm">
        <a href="{{url('/contrato')}}" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        <a href="{{url()->current()}}" class="btn btn-default"><i class="fa fa-refresh" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Datos del contrato {{$contrato->nombre_contrato}}</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="nombre_contrato">Nombre del contrato</label>
                <input type="text" class="form-control" id="nombre_contrato" name="nombre_contrato" placeholder="" value="{{$contrato->nombre_contrato}}">
                <p class="help-block">Inserte el nombre del contrato.</p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="programa_contrato">Programa</label>
                <input type="text" class="form-control" id="programa_contrato" name="programa_contrato" placeholder="Programa" value="{{$contrato->programa_contrato}}">
                <p class="help-block">Programa.</p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="fechav_contrato">Fecha de viaje</label>
                <input type="date" class="form-control" id="fechav_contrato" name="fechav_contrato" placeholder="Fecha de viaje" value="{{$contrato->fechav_contrato}}">
                <p class="help-block">Fecha programada de viaje.</p>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Agregar pasajeros</h3>
        </div>
        <div class="panel-body">
          <form class="" action="{{route('contrato.store.pas')}}" method="post">
            {{csrf_field()}}
          <input type="hidden" class="form-control" id="id_contrato" name="id_contrato" value="{{$contrato->id}}" placeholder="">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="nombre_pasajero">Nombre del pasajero</label>
                <input type="text" class="form-control" id="nombre_pasajero" name="nombre_pasajero" placeholder="Nombre">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="dni_pasajero">DNI</label>
                <input type="text" class="form-control" id="dni_pasajero" name="dni_pasajero" placeholder="DNI">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="fechanac_pasajero">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fechanac_pasajero" name="fechanac_pasajero" placeholder="">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="total_viaje">Total del viaje</label>
                <input type="text" class="form-control" id="total_viaje" name="total_viaje" placeholder="Total correspondiente al pasajero">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="cuotas">Cuotas</label>
                <input type="number" class="form-control" id="cuotas" name="cuotas" value="0" placeholder="">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="total_cuotas">Total Cuotas</label>
                <input type="text" class="form-control" id="total_cuotas" name="total_cuotas" placeholder="" readonly>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="cuotas_pagadas">Cuotas pagadas</label>
                <input type="number" class="form-control" id="cuotas_pagadas" name="cuotas_pagadas" value="0" placeholder="">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="saldo_favor">Saldo a favor</label>
                <input type="text" class="form-control" name="saldo_favor" id="saldo_favor" placeholder="" readonly>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="total_restante">Total restante</label>
                <input type="text" class="form-control" id="total_restante" name="total_restante" placeholder="">
              </div>
            </div>
            <div class="col-sm-3">
              <button type="submit" class="btn btn-success">Guardar</button>
            </div>
          </form>
        </div>
        <div class="panel-footer">

        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Listado de pasajeros</h3>
        </div>
        <div class="panel-body">
          <input class="form-control" ng-model="busquedaclientes[queryBy]" value="" id="inputbusqueda" placeholder="Buscar" />
          <div>
            <table class="table table-hover table-bordered">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>DNI</th>
                  <th>Fecha de nacimiento</th>
                  <th>Total del viaje</th>
                  <th>Cuotas</th>
                  <th>Total de cada cuota</th>
                  <th>Cuotas Pagadas</th>
                  <th>Saldo a favor</th>
                  <th>Total restante</th>
                  <th>Accion</th>
                </tr>
              </thead>
              <tbody ng-repeat="emp in clientes | filter:busquedaclientes">
                <tr>
                  <td>@{{emp.nombre_pasajero}}</td>
                  <td>@{{emp.dni_pasajero}}</td>
                  <td>@{{emp.fechanac_pasajero}}</td>
                  <td>@{{emp.total_viaje}}</td>
                  <td>@{{emp.cuotas}}</td>
                  <td>@{{emp.total_cuotas}}</td>
                  <td>@{{emp.cuotas_pagadas}}</td>
                  <td>@{{emp.saldo_favor}}</td>
                  <td>@{{emp.total_restante}}</td>
                  <td> <a href="{{url('/addpago/')}}/@{{emp.id}}">Añadir pago</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="panel-footer">

        </div>
      </div>
    </div>
  </div>

</div>
<script type="text/javascript">
$("#cuotas").keyup(function () {
    var cuotas = (parseFloat($("#cuotas").val()));
    var total_viaje = (parseFloat($("#total_viaje").val()));
    $("#total_cuotas").val(Math.round((parseFloat(total_viaje)/parseFloat(cuotas))));
});
$("#cuotas_pagadas").keyup(function () {
    var total_cuotas = (parseFloat($("#total_cuotas").val()));
    var cuotas_pagadas = (parseFloat($("#cuotas_pagadas").val()));

    $("#saldo_favor").val(Math.round((parseInt(total_cuotas)*parseInt(cuotas_pagadas))));
    $("#total_restante").val(Math.round((parseInt(total_viaje)-parseInt(saldo_favor))));
});

$("#cuotas_pagadas").keyup(function () {
    var saldo_favor = (parseFloat($("#saldo_favor").val()));
    var total_viaje = (parseFloat($("#total_viaje").val()));

    $("#total_restante").val(Math.round((parseInt(total_viaje)-parseInt(saldo_favor))));
});
</script>
@endsection
