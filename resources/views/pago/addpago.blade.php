@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="btn-group btn-group-sm">
        <a href="{{url('/pasajero/')}}" class="btn btn-success"><i class="fa fa-address-book" aria-hidden="true"></i> Pasajeros</a>
        <a href="{{url('/contrato/'.$pasajero->id_contrato)}}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Ver contrato</a>
        <a href="{{url()->current()}}" class="btn btn-default"><i class="fa fa-refresh" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Pagos efectuados</h3>
        </div>
        <div class="panel-body">
          <table class="table table-hover table-bordered">
            <thead>
              <th>Cuotas pagadas</th>
              <th>Total</th>
            </thead>
            <tbody>
              @foreach ($pasajero->pagos as $p)
                <tr>
                  <td>{{$p->cuotas}}</td>
                  <td>{{$p->total_pago}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="panel-footer">

        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <form class="" action="{{route('pago.store')}}" method="post">
        {{csrf_field()}}

        <input type="hidden" name="id_contrato" value="{{$pasajero->id_contrato}}">
        <input type="hidden" name="id_pasajero" value="{{$pasajero->id}}">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Añadir pago</h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-3">
              <div class="form-group">
                <label for="cuotas">Cantidad de cuotas</label>
                <input type="number" class="form-control" id="cuotas" name="cuotas" placeholder="" autofocus>
                <p class="help-block">Cantidad de cuotas que pagara el pasajero.</p>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="valor_cuota">Valor de la cuota</label>
                <input type="text" class="form-control" value="{{$pasajero->total_cuotas}}" id="valor_cuota" placeholder="" readonly>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="total_pago">Total</label>
                <input type="text" class="form-control" id="total_pago" name="total_pago" placeholder="">
              </div>
            </div>
        </div>
        <div class="panel-footer">
          <button type="submit" class="btn btn-success">Guardar pago</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
$("#cuotas").keyup(function () {
    var cuotas = (parseFloat($("#cuotas").val()));
    var valor_cuota = (parseFloat($("#valor_cuota").val()));
    $("#total_pago").val(Math.round((parseFloat(cuotas)*parseFloat(valor_cuota))));
});
</script>
@endsection
