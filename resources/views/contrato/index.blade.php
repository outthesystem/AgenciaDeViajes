@extends('layouts.app')

@section('content')
  <!-- Breadcrumb -->
  <script src="{{ asset('js/searchcontratos.js') }}"></script>

  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a class="btn btn-sm btn-success" href="{{route('contrato.create')}}"><i class="fa fa-plus" aria-hidden="true"></i>
Crear contrato</a>
    <a class="btn btn-sm btn-info" href="{{route('export.contratos')}}"><i class="fa fa-file-excel-o " aria-hidden="true"></i>
Exportar contratos</a>
    </div>
  </ol>
  <div class="container-fluid" ng-app="search_contratos" ng-controller="contratos_controller">

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Contratos <span ng-cloak class="badge badge-success">@{{filtered.length}}</span>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <div class="input-group">
                  <input ng-model="busquedacontratos[queryBy]" placeholder="Buscar"  id="search" name="search" class="form-control" placeholder="Buscar..." type="text" autofocus>
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                  </span>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-hover">
                  <thead>
                    <th>Nombre Contrato</th>
                    <th>Programa</th>
                    <th>Establecimiento</th>
                    <th>Destino</th>
                    <th>Fecha de viaje</th>
                    <th>Creado por</th>
                    <th>Acciones</th>
                  </thead>
                  <tbody ng-cloak ng-repeat="emp in contratos | filter:busquedacontratos as filtered">
                    <tr>
                      <td>@{{emp.nombre_contrato}}</td>
                      <td>@{{emp.programa_contrato}}</td>
                      <td>@{{emp.establecimiento_contrato}}</td>
                      <td>@{{emp.destino_contrato}}</td>
                      <td>@{{emp.fechav_contrato}}</td>
                      <td>@{{emp.usuario}}</td>
                      <td><a href="{{url('/contrato/')}}/@{{emp.id}}">Ver</a></td>
                    </tr>
                  </tbody>
                  <tbody>
                    <tr>
                      <td colspan="7" class="table-warning" ng-show="(contratos | filter:busquedacontratos).length == 0">
                        No se han encontrado resultados. :(
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
