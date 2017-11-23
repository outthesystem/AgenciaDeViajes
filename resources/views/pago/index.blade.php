@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Pasajeros</h3>
          </div>
          <div class="panel-body">
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
              <tbody>
                @foreach ($pasajeros as $p)
                  <tr>
                    <td>{{$p->nombre_pasajero}}</td>
                    <td>{{$p->dni_pasajero}}</td>
                    <td>{{$p->fechanac_pasajero}}</td>
                    <td>{{$p->total_viaje}}</td>
                    <td>{{$p->cuotas}}</td>
                    <td>{{$p->total_cuotas}}</td>
                    <td>{{$p->cuotas_pagadas}}</td>
                    <td>{{$p->saldo_favor}}</td>
                    <td>{{$p->total_restante}}</td>
                    <td><a href="{{url('/addpago/'.$p->id)}}">Ver</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="panel-footer">

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
