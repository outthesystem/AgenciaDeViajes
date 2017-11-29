@extends('layouts.app')

@section('content')
  <script src="{{ asset('js/searchrecibosindex.js') }}"></script>

  <ol class="breadcrumb">
    <div class="btn-group" role="group" aria-label="Button group">
      <a href="{{url()->current()}}" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Actualizar pagina</a>
    </div>
  </ol>

<div class="container-fluid" ng-app="search_recibosindex" ng-controller="recibosindex_controller">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          ASd
        </div>
        <div class="card-body">
          asds
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
