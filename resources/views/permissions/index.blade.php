@extends('layouts.app')

@section('content')

    <ol class="breadcrumb">
      <div class="btn-group" role="group" aria-label="Button group">
        <a href="{{ route('users.index') }}" class="btn btn-info">Usuarios</a>
        <a href="{{ route('roles.index') }}" class="btn btn-primary">Roles</a>
        <a href="{{ route('permissions.create') }}" class="btn btn-success">Añadir permiso</a>
      </div>
    </ol>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              Permisos <span class="badge">{{$permissions->count()}}</span>
            </div>
            <div class="card-block">
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Permisos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                            <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-warning pull-left">Edit</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
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
