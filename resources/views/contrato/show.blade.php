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

<ol class="breadcrumb">
  <div class="btn-group" role="group" aria-label="Button group">
    <a href="{{url('/contrato')}}" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
    <a href="{{url()->current()}}" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Actualizar pagina</a>
  </div>
</ol>

<div ng-app="contratos_pasajeros" ng-controller="ctrlpasajeros" class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card card-accent-info">
        <div class="card-header">
          Datos del contrato {{$contrato->nombre_contrato}}
        </div>
          <div class="card-body">
            <form class="row form">
            <div class="col-sm-4">
                <label for="nombre_contrato">Nombre del contrato</label>
                <input type="text" class="form-control" id="nombre_contrato" name="nombre_contrato" placeholder="" value="{{$contrato->nombre_contrato}}" readonly>
                <p class="help-block">Inserte el nombre del contrato.</p>
            </div>
            <div class="col-sm-4">
                <label for="programa_contrato">Programa</label>
                <input type="text" class="form-control" id="programa_contrato" name="programa_contrato" placeholder="" value="{{$contrato->programa_contrato}}" readonly>
                <p class="help-block">Programa.</p>
              </div>
              <div class="col-sm-4">
                  <label for="destino_contrato">Destino</label>
                  <input type="text" class="form-control" id="destino_contrato" name="destino_contrato" placeholder="" value="{{$contrato->destino_contrato}}" readonly>
                </div>
                <div class="col-sm-4">
                    <label for="establecimiento_contrato">Establecimiento</label>
                    <input type="text" class="form-control" id="establecimiento_contrato" name="establecimiento_contrato" placeholder="Programa" value="{{$contrato->establecimiento_contrato}}" readonly>
                  </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="fechav_contrato">Fecha de viaje</label>
                <input type="date" class="form-control" id="fechav_contrato" name="fechav_contrato" placeholder="Fecha de viaje" value="{{$contrato->fechav_contrato}}" readonly>
                <p class="help-block">Fecha programada de viaje.</p>
              </div>
            </div>
            <div class="col-sm-12">
              <h2>Totales</h2>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="total">Total del viaje</label>
                <input type="text" class="form-control" id="total" value="{{$contrato->total}}" readonly>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="total">Total pagado</label>
                <input type="text" class="form-control" id="pagado" value="{{$contrato->pagado}}" readonly>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="total">Total deuda</label>
                <input type="text" class="form-control" id="deuda" value="{{$contrato->deuda}}" readonly>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" rows="2" cols="80" class="form-control" readonly></textarea>
              </div>
            </div>
          </div>
        </form>
        <div class="card-footer">
          <i>Creado por <b>{{$contrato->usuario}}</b></i>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-accent-success">
        <div class="card-header">
          Agregar pasajeros
        </div>
        <div class="card-body">
          <form class="row form" action="{{route('contrato.store.pas')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
            <div class="col-sm-12">
              <h4>Datos generales</h4>
            </div>
          <input type="hidden" class="form-control" id="id_contrato" name="id_contrato" value="{{$contrato->id}}" placeholder="">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="nombre_pasajero">Nombre del pasajero</label>
                <input type="text" class="form-control" id="nombre_pasajero" name="nombre_pasajero" placeholder="Nombre" required>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="dni_pasajero">DNI</label>
                <input type="text" class="form-control" id="dni_pasajero" name="dni_pasajero" placeholder="DNI" required>
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
                <label for="telefono_pasajero">Telefono</label>
                <input type="text" class="form-control" id="telefono_pasajero" name="telefono_pasajero" placeholder="" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="localidad_pasajero">Localidad</label>
                <input type="text" class="form-control" id="localidad_pasajero" name="localidad_pasajero" placeholder="" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="direccion_pasajero">Domicilio</label>
                <input type="text" class="form-control" id="direccion_pasajero" name="direccion_pasajero" placeholder="" required>
              </div>
            </div>
            <div class="col-sm-12">
              <h4>Datos de los responsables</h4>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="nombre_resp">Nombre</label>
                <input type="text" class="form-control" id="nombre_resp" name="nombre_resp" placeholder="Nombre" >
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="telefono_resp">Telefono</label>
                <input type="text" class="form-control" id="telefono_resp" name="telefono_resp" placeholder="Telefono" >
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="localidad_resp">Localidad</label>
                <input type="text" class="form-control" id="localidad_resp" name="localidad_resp" placeholder="Localidad" >
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="direccion_resp">Direccion</label>
                <input type="text" class="form-control" id="direccion_resp" name="direccion_resp" placeholder="Direccion" >
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="nombre_resp1">Nombre</label>
                <input type="text" class="form-control" id="nombre_resp1" name="nombre_resp1" placeholder="Nombre" >
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="telefono_resp1">Telefono</label>
                <input type="text" class="form-control" id="telefono_resp1" name="telefono_resp1" placeholder="Telefono" >
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="localidad_resp1">Localidad</label>
                <input type="text" class="form-control" id="localidad_resp1" name="localidad_resp1" placeholder="Localidad" >
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="direccion_resp1">Direccion</label>
                <input type="text" class="form-control" id="direccion_resp1" name="direccion_resp1" placeholder="Direccion" >
              </div>
            </div>
            <div class="col-sm-12">
              <h4>Datos facturacion</h4>
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
            <div class="col-sm-2">
              <div class="form-group">
                <label for="total_cuotas">Total cada cuota</label>
                <input type="text" class="form-control" id="total_cuotas" name="total_cuotas" placeholder="" readonly>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="cuotas_pagadas">Cuotas pagadas</label>
                <input type="text" class="form-control" id="cuotas_pagadas" name="cuotas_pagadas" value="0" placeholder="" required>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <label for="saldo_favor">Saldo a favor</label>
                <input type="text" class="form-control" name="saldo_favor" id="saldo_favor" placeholder="" readonly>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="total_restante">Total deuda</label>
                <input type="text" class="form-control" id="total_restante" name="total_restante" placeholder="" required>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" rows="2" cols="80" class="form-control"></textarea>
              </div>
            </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </div>
  </form>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="card card-accent-warning">
        <div class="card-header">
        Listado de pasajeros <span class="badge badge-success">@{{filtered.length}}</span>
        </div>
        <div class="card-body">
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
                  <th>Total deuda</th>
                  <th>Accion</th>
                </tr>
              </thead>
              <tbody ng-cloak ng-repeat="emp in clientes | filter:busquedaclientes as filtered">
                <tr>
                  <td>@{{emp.nombre_pasajero}}</td>
                  <td>@{{emp.dni_pasajero}}</td>
                  <td>@{{emp.fechanac_pasajero}}</td>
                  <td>@{{emp.total_viaje}}</td>
                  <td>@{{emp.cuotas}}</td>
                  <td>@{{emp.total_cuotas | currency}}</td>
                  <td>@{{emp.cuotas_pagadas}}</td>
                  <td>@{{emp.saldo_favor | currency}}</td>
                  <td>@{{emp.total_restante | currency}}</td>
                  <td> <a href="{{url('/addpago/')}}/@{{emp.id}}">Añadir pago</a></td>
                </tr>
              </tbody>
              <tbody>
                <tr>
                  <td colspan="10" class="table-warning" ng-show="(clientes | filter:busquedaclientes).length == 0">
                    No se han encontrado resultados. :(
                  </td>
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
    $("#total_cuotas").val(parseFloat((parseFloat(total_viaje)/parseFloat(cuotas)).toFixed(2)));
});
$("#cuotas_pagadas").keyup(function () {
    var total_cuotas = (parseFloat($("#total_cuotas").val()));
    var cuotas_pagadas = (parseFloat($("#cuotas_pagadas").val()));

    $("#saldo_favor").val(parseFloat(parseFloat(total_cuotas)*parseFloat(cuotas_pagadas)).toFixed(2));
    $("#total_restante").val(parseFloat(parseFloat(total_viaje)-parseFloat(saldo_favor)).toFixed(2));
});

$("#cuotas_pagadas").keyup(function () {
    var saldo_favor = (parseFloat($("#saldo_favor").val()));
    var total_viaje = (parseFloat($("#total_viaje").val()));

    $("#total_restante").val(parseFloat((parseFloat(total_viaje)-parseFloat(saldo_favor))).toFixed(2));
});
</script>
@endsection
