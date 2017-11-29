@extends('layouts.app')

@section('content')

  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a href="{{ route('roles.index') }}" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i>
 Volver</a>
      <a href="{{ url()->current() }}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
    </div>
  </ol>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Crear rol
          </div>
          <div class="card-block">
            {{ Form::open(array('url' => 'roles')) }}
              <div class="form-group">
                  {{ Form::label('name', 'Nombre del rol') }}
                  {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Consultante por ejemplo')) }}
              </div>
              <h5><b>Asignar permisos</b></h5>
              <div class='form-group'>
                  @foreach ($permissions as $permission)
                      {{ Form::checkbox('permissions[]',  $permission->id ) }}
                      {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
                  @endforeach
              </div>
              {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
              {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
