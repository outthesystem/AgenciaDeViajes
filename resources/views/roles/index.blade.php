@extends('layouts.app')

@section('content')

    <ol class="breadcrumb">
      <div class="btn-group" role="group" aria-label="Button group">
        <a href="{{ route('users.index') }}" class="btn btn-info">Usuarios</a>
        <a href="{{ route('permissions.index') }}" class="btn btn-primary">Permisos</a>
        <a href="{{ route('roles.create') }}" class="btn btn-success">Añadir rol</a>
      </div>
    </ol>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              Roles <span class="badge">{{$roles->count()}}</span>
            </div>
            <div class="card-block">
              <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Role</th>
                              <th>Permissions</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($roles as $role)
                          <tr>
                              <td>{{ $role->name }}</td>
                              <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                              <td>
                              <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-warning pull-left">Edit</a>
                              {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
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
