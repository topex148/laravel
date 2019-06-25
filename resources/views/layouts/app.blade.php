<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Meriventura</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CORE CSS -->
    <link href="{{ asset("assets/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

    <!-- THEME CSS -->
    <link href="{{ asset("assets/css/essentials.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("assets/css/layout.css") }}" rel="stylesheet" type="text/css" />

    <!-- PAGE LEVEL SCRIPTS -->
    <link href="{{ asset("assets/css/header-1.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("assets/css/layout-shop.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("assets/css/color_scheme/green.css") }}" rel="stylesheet" type="text/css" id="color_scheme" />
    <!--Prueba final-->

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{ asset("assets/images/_smarty/logo-126x39.png") }}" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                      @can('users.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('users.index')}}"> Usuarios </a>
                      </li>
                      @endcan

                      @can('roles.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('roles.index')}}"> Roles </a>
                      </li>
                      @endcan

                      @can('packages.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('packages.index')}}"> Paquetes </a>
                      </li>
                      @endcan

                      @can('actividades.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('actividades.index')}}"> Actividades </a>
                      </li>
                      @endcan

                      @can('atractivos.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('atractivos.index')}}"> Atractivos </a>
                      </li>
                      @endcan

                      @can('contactos.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('contactos.index')}}"> Contactos </a>
                      </li>
                      @endcan

                      @can('fotos.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('fotos.index')}}"> Fotos </a>
                      </li>
                      @endcan

                      @can('itinerarios.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('itinerarios.index')}}"> Itinerarios </a>
                      </li>
                      @endcan

                      @can('planes.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('planes.index')}}"> Planes </a>
                      </li>
                      @endcan

                      @can('prestadores.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('prestadores.index')}}"> Prestadores </a>
                      </li>
                      @endcan

                      @can('turistas.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('turistas.index')}}"> Turistas </a>
                      </li>
                      @endcan

                      @can('zonas.index')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('zonas.index')}}"> Zonas </a>
                      </li>
                      @endcan

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(session('info'))
              <div class="container">
                <div class="row justify-content-center">
                  <div class="col-md-8 col-md-offset-2">
                     <div class="alert alert-success">
                       {{ session('info')}}
                     </div>
                  </div>
               </div>
             </div>
            @endif

            @yield('content')
        </main>
    </div>




    	<!-- JAVASCRIPT FILES -->
    		<script type="text/javascript">var plugin_path = '{{ asset('assets/plugins/') }}/';</script>
    		<script type="text/javascript" src="{{ asset("assets/plugins/jquery/jquery-3.2.1.min.js") }}"></script>
    		<script type="text/javascript" src="{{ asset("assets/js/scripts.js") }}"></script>

    		<!-- PAGE LEVEL SCRIPTS -->
    		<script type="text/javascript" src="{{ asset("assets/js/view/demo.shop.js") }}"></script>

        <!-- STYLESWITCHER - REMOVE -->
    		<script async type="text/javascript" src="{{ asset("demo_files/styleswitcher/styleswitcher.js") }}"></script>

</body>
</html>
