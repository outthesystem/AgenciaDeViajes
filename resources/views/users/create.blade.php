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
            Crear usuario
          </div>
          <div class="card-block">
            <div class='col-lg-12'>

              {!! Form::open(array('url' => 'users', 'class' => 'form row')) !!}
              <div class="form-group col-sm-6 @if ($errors->has('name')) has-error @endif">
                  {!! Form::label('name', 'Nombre') !!}
                  {!! Form::text('name', '', array('class' => 'form-control')) !!}
              </div>
              <div class="form-group col-sm-6 @if ($errors->has('email')) has-error @endif">
                  {!! Form::label('email', 'Email') !!}
                  {!! Form::email('email', '', array('class' => 'form-control')) !!}
              </div>
              <h5><b>Assign Role</b></h5>
              <div class="form-group col-sm-12 @if ($errors->has('roles')) has-error @endif">
                  @foreach ($roles as $role)
                      {!! Form::checkbox('roles[]',  $role->id ) !!}
                      {!! Form::label($role->name, ucfirst($role->name)) !!}<br>
                  @endforeach
              </div>
              <div class="form-group col-sm-6 @if ($errors->has('password')) has-error @endif">
                  {!! Form::label('password', 'Clave') !!}<br>
                  {!! Form::password('password', array('class' => 'form-control')) !!}
              </div>
              <div class="form-group col-sm-6 @if ($errors->has('password')) has-error @endif">
                  {!! Form::label('password', 'Confirmar clave') !!}<br>
                  {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
              </div>

          </div>
          </div>
          <div class="card-footer">
            {!! Form::submit('Crear', array('class' => 'btn btn-success')) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
