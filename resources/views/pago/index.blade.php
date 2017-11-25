@extends('layouts.app')

@section('content')
  <script src="{{ asset('js/searchpasajeros.js') }}"></script>

  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a href="{{url()->current()}}" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Actualizar pagina</a>
    </div>
  </ol>
  <div class="container-fluid" ng-app="search_pasajeros" ng-controller="pasajeros_controller">
    <div class="row">
      <div class="col-sm-12">
        
        <div class="card">
          <div class="card-header">
            Pasajeros <span ng-cloak class="badge badge-success">@{{filtered.length}}</span>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <div class="input-group">
                  <input ng-model="busquedapasajeros[queryBy]" placeholder="Buscar"  id="search" name="search" class="form-control" placeholder="Buscar..." type="text" autofocus>
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                  </span>
                </div>
              </div>
            </div>
              <br>

            <table class="table table-hover table-bordered">
              <thead>
                <th>Nombre y apellido</th>
                <th>DNI</th>
                <th>Fecha de nacimiento</th>
                <th>Total de viaje</th>
                <th>Cuotas</th>
                <th>Total cuotas</th>
                <th>Cuotas abonadas</th>
                <th>Saldo a favor</th>
                <th>Saldo restante</th>
                <th>Acciones</th>
              </thead>
              <tbody ng-cloak ng-repeat="p in pasajeros | filter:busquedapasajeros as filtered">
                  <tr>
                    <td>@{{p.nombre_pasajero}}</td>
                    <td>@{{p.dni_pasajero}}</td>
                    <td>@{{p.fechanac_pasajero}}</td>
                    <td>@{{p.total_viaje | currency}}</td>
                    <td>@{{p.cuotas}}</td>
                    <td>@{{p.total_cuotas | currency}}</td>
                    <td>@{{p.cuotas_pagadas}}</td>
                    <td>@{{p.saldo_favor | currency}}</td>
                    <td>@{{p.total_restante | currency}}</td>
                    <td><a href="{{url('/addpago/')}}/@{{p.id}}">Ver</a></td>
                  </tr>
              </tbody>
              <tbody>

                <tr>
                  <td colspan="10" ngcloak class="table-warning" ng-show="(pasajeros | filter:busquedapasajeros).length == 0">
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
@endsection
