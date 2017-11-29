@extends('layouts.app')

@section('content')

  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a href="{{ route('roles.index') }}" class="btn btn-info">Roles</a>
      <a href="{{ route('permissions.index') }}" class="btn btn-primary">Permisos</a>
      <a href="{{ route('users.create') }}" class="btn btn-success">Añadir usuario</a>
    </div>
  </ol>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            Usuarios
          </div>
          <div class="card-block">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Creado</th>
                            <th>Roles</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                            <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>
                            <td>
                              <div class="btn-group btn-group-xs" role="group" aria-label="Toolbar with button groups">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                              </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection
