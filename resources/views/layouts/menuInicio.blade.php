<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0"><!--Esta etiqueta permite que el sitio web se vea bien en todos los navegadores, inclusive dispositivos moviles-->
<title>Meriventura</title><!--
<link rel="stylesheet" href="css/bootstrap.min.css">
-->
<!--Prueba inicio-->

<meta charset="utf-8" />
		<title>Smarty - Multipurpose + Admin</title>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

		<link href="{{asset('css/app.css')}}" rel="stylesheet">
		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="{{ asset("assets/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->
		<link href="{{ asset("assets/css/layout.css") }}" rel="stylesheet" type="text/css" />
		<link href='{{ asset('assets/css/essentials.css') }}' rel="stylesheet" type="text/css" />


		<!-- PAGE LEVEL SCRIPTS -->
		<link href="{{ asset("assets/css/header-1.css") }}" rel="stylesheet" type="text/css" />

		<link href="{{ asset("assets/css/color_scheme/green.css") }}" rel="stylesheet" type="text/css" id="color_scheme" />
<!--Prueba final-->

</head>
<body>


  <div id="header" class="navbar-toggleable-md sticky clearfix">

  				<!-- TOP NAV -->
  				<header id="topNav">
  					<div class="container">

  						<!-- Mobile Menu Button -->
  						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
  							<i class="fa fa-bars"></i>
  						</button>

  						<!-- Logo -->
              <a class="navbar-brand" href="{{ url('/home') }}">
                  <img src="{{ asset("assets/images/_smarty/logo-126x39.png") }}" alt="" />
              </a>


  						<div class="navbar-collapse collapse float-right nav-main-collapse">
  							<nav class="nav-main">

  								<ul id="topMain" class="nav nav-pills nav-main">


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

										@can('users.index')
										<li class="nav-item">
											<a class="nav-link" href="{{route('suscripcion')}}"> Suscriptores </a>
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
                      <a class="nav-link" href="{{route('fotos.index')}}"> Fotos Galeria </a>
                    </li>
                    @endcan

										@can('publicidad.index')
										<li class="nav-item">
											<a class="nav-link" href="{{route('publicidad.index')}}"> Publicidad </a>
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

									<!--Prueba menu Prestador -->

									@can('prestador.index')
									<li class="nav-item">
										<a class="nav-link" href="{{route('prestador.index')}}"> Perfil Prestador </a>
									</li>
									@endcan

									@can('prestador.index')
									<li class="nav-item">
										<a class="nav-link" href="{{route('prestador.planes')}}"> Planes Prestador </a>
									</li>

									@endcan

									@can('prestador.index')

									<li class="dropdown"><!-- Factura STRIPE -->

										<a  href="http://localhost/LaTesis/public/invoices">
											<span class="bordered">Factura Stripe</span>
										</a>

									</li>
									@endcan

									<!-- Fin Prueba menu Prestador -->

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
                        <li class="dropdown active">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

														<ul class="dropdown-menu">

															<li class="dropdown">
															<a  href="http://localhost/LaTesis/public/inicio">
																<span class="bordered">Menu Principal</span>
															</a>
															</li>

															<li class="dropdown">
															<a  href="http://localhost/LaTesis/public/home">
																<span class="bordered">Menu Usuario</span>
															</a>
															</li>

															<li class="dropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>
																</li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endguest

  								</ul>   <!--FIN MENU-->



  							</nav>
  						</div>

  					</div>
  				</header>
  				<!-- /Top Nav -->

  			</div>



	<!--   <main class="py-4">
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
  </main>-->

    @yield('content')

  <!-- FOOTER -->
  <footer id="footer">


  	<div class="copyright">
  		<div class="container">

  			Copyright &copy; 2019 MERIVENTURA. Todos los derechos reservados.
  		</div>
  	</div>

  </footer>
  <!-- /FOOTER -->

<!-- SCROLL TO TOP -->
	<a href="#" id="toTop"></a>


	<!-- PRELOADER -->
	<div id="preloader">
		<div class="inner">
			<span class="loader"></span>
		</div>
	</div><!-- /PRELOADER -->


	<!--<script src="js/jquery-3.3.1.min.js"></script>-->
	<script src="{{ asset("js/popper.min.js") }}"></script>
	<script src="{{ asset("js/bootstrap.min.js") }}"></script>


	<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = '{{ asset('assets/plugins/') }}/';</script>
		<script type="text/javascript" src="{{ asset("assets/plugins/jquery/jquery-3.2.1.min.js") }}"></script>
		<script type="text/javascript" src="{{ asset("assets/js/scripts.js") }}"></script>

		<!-- PAGE LEVEL SCRIPTS -->
		<script type="text/javascript" src="{{ asset("assets/js/view/demo.shop.js") }}"></script>



</body>
</html>
