<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/angular.min.js') }}"></script>
    <script src="{{ asset('js/searchcontratos.js') }}"></script>
    <script src="{{ asset('js/jquery-editable-select.js') }}"></script>
    <script src="{{ asset('js/ui-bootstrap-tpls-2.5.0.min.js') }}"></script>

    <script src="{{ asset('js/contratos_pasajeros.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-editable-select.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<style media="screen">
.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<body class="app">
  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
    <a class="navbar-brand" href="{{ url('/') }}">
    </a>
    <ul class="nav navbar-nav d-md-down-none">
      @guest
        @else
          <li class="nav-item">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="d-md-down-none">  {{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-header text-center">
                <strong>Cuenta</strong>
              </div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Salir</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
            </div>
          </li>
      @endguest
      <li class="nav-item">
      </li>
    </ul>
  </header>
  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          @guest
            @else
              <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}
                " href="{{route('dashboard.index')}}"><i class="icon-speedometer"></i> <i class="fa fa-line-chart"></i> Dashboard </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ request()->is('contrato/*') ? 'active' : '' }}
                {{ request()->is('contrato') ? 'active' : '' }}
                {{ request()->is('contrato/create') ? 'active' : '' }}" href="{{route('contrato.index')}}"><i class="icon-speedometer"></i> <i class="fa fa-file-text"></i> Contratos </a>
              </li>
              <li class="nav-item">
                <a class="nav-link   {{ request()->is('pasajero') ? 'active' : '' }}
                  {{ request()->is('addpago/*') ? 'active' : '' }}" href="{{route('pasajero.index')}}" ><i class="icon-speedometer"></i> <i class="fa fa-address-book-o"></i> Pasajeros </a>
              </li>
          @endguest
        </ul>
      </nav>
      <button class="sidebar-minimizer brand-minimizer" type="button"></button>

    </div>

    <!-- Main content -->
    <main class="main">

        @yield('content')

  </div>
  </main>

    <!-- Scripts -->
<script type="text/javascript">
  var base_url = '{{ url('/') }}';
</script>
{!! Notify::render() !!}

</body>
</html>
