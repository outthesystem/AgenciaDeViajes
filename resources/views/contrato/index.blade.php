@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="btn-group btn-group-sm">
          <a class="btn btn-sm btn-success" href="{{route('contrato.create')}}">Crear contrato</a>
        </div>
      </div>
    </div>
    <br>

    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Contratos</h3>
          </div>
          <div class="panel-body">
            <table class="table table-hover">
              <thead>
                <th>Nombre Contrato</th>
                <th>Programa</th>
                <th>Fecha de viaje</th>
                <th>Acciones</th>
              </thead>
              <tbody>
                @foreach ($contratos as $c)
                  <tr>
                    <td>{{$c->nombre_contrato}}</td>
                    <td>{{$c->programa_contrato}}</td>
                    <td>{{$c->fechav_contrato}}</td>
                    <td><a href="{{url('/contrato/'.$c->id)}}">Ver</a></td>
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
