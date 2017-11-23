@extends('layouts.app')

@section('content')

<div class="container">
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
      <form class="" action="{{route('contrato.store')}}" method="post">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Datos del contrato</h3>
        </div>
        <div class="panel-body">
             {{csrf_field()}}
            <div class="col-sm-4">
              <div class="form-group">
                <label for="nombre_contrato">Nombre del contrato</label>
                <input type="text" class="form-control" id="nombre_contrato" name="nombre_contrato" placeholder="">
                <p class="help-block">Inserte el nombre del contrato.</p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="programa_contrato">Programa</label>
                <input type="text" class="form-control" id="programa_contrato" name="programa_contrato" placeholder="Programa">
                <p class="help-block">Programa.</p>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="fechav_contrato">Fecha de viaje</label>
                <input type="date" class="form-control" id="fechav_contrato" name="fechav_contrato" placeholder="Fecha de viaje">
                <p class="help-block">Fecha programada de viaje.</p>
              </div>
            </div>
        </div>
        <div class="panel-footer">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>

@endsection
