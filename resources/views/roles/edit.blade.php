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
              Actualizar a <b>{{$role->name}}</b>
            </div>
            <div class="card-block">
              {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}
                <div class="form-group">
                    {{ Form::label('name', 'Nombre del rol') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <h3>Asignar permisos</h3>
                @foreach ($permissions as $permission)
                    {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                    {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                @endforeach

                </div>
              <div class="card-footer">
                {{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}
                {{ Form::close() }}
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
