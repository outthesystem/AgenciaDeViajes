@extends('layouts.app')

@section('content')

    <ol class="breadcrumb">
      <div class="btn-group" role="group" aria-label="Button group">
        <a href="{{ route('users.index') }}" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i>
   Volver</a>
        <a href="{{ url()->current() }}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
      </div>
    </ol>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              Actualizar a <b>{{$user->name}}</b>
            </div>
            <div class="card-block">
              <div class='col-lg-12'>

                {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    {{ Form::label('name', 'Nombre') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <div class="form-group @if ($errors->has('email')) has-error @endif">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', null, array('class' => 'form-control')) }}
                </div>
                <h5><b>Asignar Rol</b></h5>
                <div class="form-group @if ($errors->has('roles')) has-error @endif">
                    @foreach ($roles as $role)
                        {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                    @endforeach
                </div>
                <div class="form-group @if ($errors->has('password')) has-error @endif">
                    {{ Form::label('password', 'Clave') }}<br>
                    {{ Form::password('password', array('class' => 'form-control')) }}
                </div>
                <div class="form-group @if ($errors->has('password')) has-error @endif">
                    {{ Form::label('password', 'Confirmar clave') }}<br>
                    {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                </div>

            </div>
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
