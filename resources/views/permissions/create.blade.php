@extends('layouts.app')

@section('content')

  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a href="{{ route('permissions.index') }}" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i>
 Volver</a>
      <a href="{{ url()->current() }}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
    </div>
  </ol>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Crear permiso
          </div>
          <div class="card-block">
            {{ Form::open(array('url' => 'permissions')) }}
            <div class="form-group">
                {{ Form::label('name', 'Nombre del permiso') }}
                {{ Form::text('name', '', array('class' => 'form-control')) }}
            </div><br>
            @if(!$roles->isEmpty())
                <h3>Asignar permisos a los roles</h3>
                @foreach ($roles as $role)
                    {{ Form::checkbox('roles[]',  $role->id ) }}
                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                @endforeach
            @endif
            <br>
            {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
