@extends('layouts.app')

@section('content')

  <script type="text/javascript">
    var id_pasajero = {{$pasajero->id}}
  </script>
  <script src="{{ asset('js/searchrecibos.js') }}"></script>
  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a href="{{url('/pasajero/')}}" class="btn btn-success"><i class="fa fa-address-book" aria-hidden="true"></i> Pasajeros</a>
      <a href="{{url('/contrato/'.$pasajero->id_contrato)}}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Ver contrato</a>
      <a href="{{url()->current()}}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
    </div>
  </ol>
<div class="container-fluid"  ng-app="search_recibos" ng-controller="recibos_controller">
<div class="row">
  <div class="col-sm-12">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="facturacion-tab" data-toggle="tab" href="#facturacion" role="tab" aria-controls="facturacion" aria-expanded="true">Facturacion {{$pasajero->nombre_pasajero}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Datos Generales de {{$pasajero->nombre_pasajero}}</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="facturacion" role="tabpanel" aria-labelledby="facturacion-tab">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                Pagos efectuados <span ng-cloak class="badge badge-success">@{{filtered.length}}</span>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="input-group">
                      <input ng-model="busquedarecibos[queryBy]" placeholder="Buscar"  id="search" name="search" class="form-control" placeholder="Buscar..." type="text" autofocus>
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                      </span>
                    </div>
                  </div>
                </div>
                <br>
                <table class="table table-hover table-bordered">
                  <thead>
                    <th>Numero de recibo</th>
                    <th>Cuotas pagadas</th>
                    <th>Fecha y hora</th>
                    <th>Creado por</th>
                    <th>Acciones</th>
                  </thead>
                    <tbody ng-cloak ng-repeat="r in recibos | filter:busquedarecibos as filtered">
                      <tr>
                        <td>@{{r.id}}</td>
                        <td>@{{r.cuotas}}</td>
                        <td>@{{r.total_pago | currency}}</td>
                        <td>@{{r.created_at}}</td>
                        <td>@{{r.usuario}}</td>
                        <td><a href="{{url('/addpago/imprimir/')}}/@{{r.id}}">Imprimir</a></td>
                      </tr>
                    </tbody>
                  <tbody>
                    <tr>
                      <td colspan="7" class="table-warning" ng-show="(recibos | filter:busquedarecibos).length == 0">
                        No se han encontrado resultados. :(
                      </td>
                    </tr>
                  </tbody>
                </table>
                <form class="row form">
                  <div class="col-sm-12">
                    <h4>Datos facturacion</h4>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="total_viaje">Total del viaje</label>
                      <input type="text" class="form-control"  value="{{$pasajero->total_viaje}}" readonly>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="cuotas">Cuotas</label>
                      <input type="number" class="form-control"  value="{{$pasajero->cuotas}}" readonly>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="total_cuotas">Total de cada cuota</label>
                      <input type="text" class="form-control"  value="{{$pasajero->total_cuotas}}" readonly>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="cuotas_pagadas">Cuotas pagadas</label>
                      <input type="text" class="form-control" value="{{$pasajero->cuotas_pagadas}}" readonly>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label for="saldo_favor">Saldo a favor</label>
                      <input type="text" class="form-control" value="{{$pasajero->saldo_favor}}" readonly>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="total_restante">Total deuda</label>
                      <input type="text" class="form-control"   value="{{$pasajero->total_restante}}" readonly>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">

            <div class="card">
              <div class="card-header">
                Añadir pago
              </div>
              <div class="card-body">
                <form class="row form" action="{{route('pago.store')}}" method="post">
                  {{csrf_field()}}
                  <input type="hidden" name="id_contrato" value="{{$pasajero->id_contrato}}">
                  <input type="hidden" name="id_pasajero" value="{{$pasajero->id}}">
                  <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="cuotas">Cantidad de cuotas</label>
                      <input type="number" class="form-control" id="cuotas" name="cuotas" placeholder="" autofocus required>
                      <p class="help-block">Cantidad de cuotas que pagara el pasajero.</p>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="valor_cuota">Valor de la cuota</label>
                      <input type="text" class="form-control" value="{{$pasajero->total_cuotas}}" id="valor_cuota" placeholder="" required>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="total_pago">Total</label>
                      <input type="text" required class="form-control" id="total_pago" name="total_pago" placeholder="" required>
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
                <button type="submit" class="btn btn-success">Guardar pago</button>
              </div>
            </div>
            </form>
          </div>
        </div>

      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="card card-accent-success">
          <div class="card-header">
            Datos del pasajero.
          </div>
          <div class="card-body">
            <form class="row form" method="post">
              {{csrf_field()}}
              <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
              <div class="col-sm-12">
                <h4>Datos generales</h4>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="nombre_pasajero">Nombre del pasajero</label>
                  <input type="text" class="form-control" id="nombre_pasajero" name="nombre_pasajero" placeholder="Nombre" value="{{$pasajero->nombre_pasajero}}" readonly>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="dni_pasajero">DNI</label>
                  <input type="text" class="form-control" id="dni_pasajero" name="dni_pasajero" placeholder="DNI" value="{{$pasajero->dni_pasajero}}" readonly>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="fechanac_pasajero">Fecha de nacimiento</label>
                  <input type="date" class="form-control" id="fechanac_pasajero" name="fechanac_pasajero" value="{{$pasajero->fechanac_pasajero}}" readonly>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="telefono_pasajero">Telefono</label>
                  <input type="text" class="form-control" id="telefono_pasajero" name="telefono_pasajero" value="{{$pasajero->telefono_pasajero}}" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="localidad_pasajero">Localidad</label>
                  <input type="text" class="form-control" id="localidad_pasajero" name="localidad_pasajero" value="{{$pasajero->localidad_pasajero}}" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="direccion_pasajero">Domicilio</label>
                  <input type="text" class="form-control" id="direccion_pasajero" name="direccion_pasajero" value="{{$pasajero->direccion_pasajero}}" readonly>
                </div>
              </div>
              <div class="col-sm-12">
                <h4>Datos de los responsables</h4>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="nombre_resp">Nombre</label>
                  <input type="text" class="form-control" id="nombre_resp" name="nombre_resp"  value="{{$pasajero->nombre_resp}}" readonly>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="telefono_resp">Telefono</label>
                  <input type="text" class="form-control" id="telefono_resp" name="telefono_resp" value="{{$pasajero->telefono_resp}}" readonly>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="localidad_resp">Localidad</label>
                  <input type="text" class="form-control" id="localidad_resp" name="localidad_resp" value="{{$pasajero->localidad_resp}}" readonly>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="direccion_resp">Direccion</label>
                  <input type="text" class="form-control" id="direccion_resp" name="direccion_resp" value="{{$pasajero->direccion_resp}}" readonly>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="nombre_resp1">Nombre</label>
                  <input type="text" class="form-control" id="nombre_resp1" name="nombre_resp1" value="{{$pasajero->nombre_resp1}}" readonly>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="telefono_resp1">Telefono</label>
                  <input type="text" class="form-control" id="telefono_resp1" name="telefono_resp1" value="{{$pasajero->telefono_resp1}}" readonly>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="localidad_resp1">Localidad</label>
                  <input type="text" class="form-control" id="localidad_resp1" name="localidad_resp1" value="{{$pasajero->localidad_resp1}}" readonly>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="direccion_resp1">Direccion</label>
                  <input type="text" class="form-control" id="direccion_resp1" name="direccion_resp1" value="{{$pasajero->direccion_resp1}}" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <i>Creado por <b>{{$pasajero->usuario}}</b></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
$("#cuotas").keyup(function () {
    var cuotas = (parseFloat($("#cuotas").val()));
    var valor_cuota = (parseFloat($("#valor_cuota").val()));
    $("#total_pago").val(parseFloat((parseFloat(cuotas)*parseFloat(valor_cuota))).toFixed(2));
});
</script>
@endsection
