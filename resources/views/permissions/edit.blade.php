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
              Actualizar a <b>{{$permission->name}}</b>
            </div>
            <div class="card-block">
              {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
                <div class="form-group">
                    {{ Form::label('name', 'Nombre del permiso') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <input type="hidden" name="guard_name" value="{{$permission->name}}">
                <br>
                {{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}
                {{ Form::close() }}

                </div>
            </div>
          </div>
        </div>
      </div>
@endsection
