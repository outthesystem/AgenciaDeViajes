@extends('layouts.app')
@section('content')

  <ol class="breadcrumb">
    ERROR - No tienes accesos a esta seccion del sistema
  </ol>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              ERROR 401
            </div>
            <div class="card-block">
              <h4 class="card-title">No tienes acceso a esta seccion.</h4>
              <p class="card-text">no podes ingresar a estaccion</p>
              Pidele a un administrador el acceso.
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
