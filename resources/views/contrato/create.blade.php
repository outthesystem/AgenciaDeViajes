@extends('layouts.app')

@section('content')
  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a href="{{url('/contrato')}}" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</a>
      <a href="{{url()->current()}}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Actualizar</a>
    </div>
  </ol>
  <div class="container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          Datos del contrato
        </div>
        <div class="card-body">
          <form class="row form" action="{{route('contrato.store')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
           <div class="col-sm-4">
             <div class="form-group">
               <label for="nombre_contrato">Nombre del contrato</label>
               <input type="text" autofocus class="form-control" id="nombre_contrato" name="nombre_contrato" placeholder="" required>
               <p class="help-block">Inserte el nombre del contrato.</p>
             </div>
           </div>
           <div class="col-sm-4">
             <div class="form-group">
               <label for="programa_contrato">Programa</label>
               <input type="text" class="form-control" id="programa_contrato" name="programa_contrato" placeholder="Programa" required>
               <p class="help-block">Programa.</p>
             </div>
           </div>
           <div class="col-sm-4">
             <div class="form-group">
               <label for="programa_contrato">Establecimiento</label>
               <input type="text" class="form-control" id="establecimiento_contrato" name="establecimiento_contrato" placeholder="" required>
               <p class="help-block">Establecimiento contratante.</p>
             </div>
           </div>
           <div class="col-sm-4">
             <div class="form-group">
               <label for="programa_contrato">Destino</label>
               <input type="text" class="form-control" id="destino_contrato" name="destino_contrato" placeholder="" required>
               <p class="help-block">Destino del contrato.</p>
             </div>
           </div>
           <div class="col-sm-4">
             <div class="form-group">
               <label for="fechav_contrato">Fecha de viaje</label>
               <input type="date" class="form-control" id="fechav_contrato" name="fechav_contrato" placeholder="Fecha de viaje" required>
               <p class="help-block">Fecha programada de viaje.</p>
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
      </form>

      </div>
    </div>
  </div>
</div>

@endsection
