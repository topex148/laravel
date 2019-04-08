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
		<meta name="description" content="" />
		<meta name="Author" content="Dorin Grigoras [www.stepofweb.com]" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

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


  <div id="header" class="navbar-toggleable-md sticky clearfix">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>


						<!-- Logo -->
						<a  href="http://localhost/LaTesis/public/inicio" class="logo float-left" href="index.html">
							<img src="{{ asset("assets/images/_smarty/logo-126x80.png") }}" alt="" />
						</a>

						<!--
							Top Nav

							AVAILABLE CLASSES:
							submenu-dark = dark sub menu
						-->
						<div class="navbar-collapse collapse float-right nav-main-collapse">
							<nav class="nav-main">

								<!--
									NOTE

									For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.
									Direct Link Example:

									<li>
										<a href="#">HOME</a>
									</li>
								-->
								<ul id="topMain" class="nav nav-pills nav-main">






								<!-- 	<li> --><!-- INICIO -->
								<!-- 		<a  href="http://localhost/comienzo/public/index"> -->
									<!-- 		<span class="bordered">INICIO</span> -->
									<!-- 	</a> -->
								<!-- 	</li> -->
								@if(Auth::guest())


									<li class="dropdown"><!-- NOSOTROS -->

										<a  href="http://localhost/LaTesis/public/nosotros">
											<span class="bordered">Nosotros</span>
										</a>

									</li>

									<li class="dropdown"><!-- ATRACTIVOS -->

										<a  href="http://localhost/LaTesis/public/atractivoLista">
											<span class="bordered">Atractivos</span>
										</a>

									</li>

									<li class="dropdown"><!-- ZONAS -->

										<a  href="http://localhost/LaTesis/public/zonaLista">
											<span class="bordered">Zonas</span>
										</a>

									</li>

									<li class="dropdown"><!-- ACTIVIDADES -->

										<a  href="http://localhost/LaTesis/public/actividadLista">
											<span class="bordered">Actividades</span>
										</a>

									</li>

									<li class="dropdown"><!-- SERVICIOS -->

										<a  href="http://localhost/LaTesis/public/servicioLista">
											<span class="bordered">Servicios</span>
										</a>

									</li>

									<li class="dropdown"><!-- GALERIA -->

										<a  href="http://localhost/LaTesis/public/galeria">
											<span class="bordered">Galeria</span>
										</a>

									</li>

									<li class="dropdown"><!-- CONTACTO -->

										<a  href="http://localhost/LaTesis/public/contacto">
											<span class="bordered">Contacto</span>
										</a>

									</li>

									@endif

									<!--	@if (session('statut') == 'user')

										@endif-->

									<!-- LOGIN-->

									@guest
											<li class="dropdown">
													<a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
											</li>
											<li class="dropdown">
													@if (Route::has('register'))
															<a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
													@endif
											</li>
									@else
											<li class="dropdown">
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


								<!-- <li class="dropdown">--><!-- INGRESAR -->

									<!-- 	<a  href="http://localhost/prueba/public/login">-->
										<!-- 	<span class="bordered">INGRESAR</span>-->
									<!-- 	</a>-->

								<!-- 	</li>-->


								</ul>   <!--FIN MENU-->

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>


	<!--		<main class="py-4">
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
			<div class="container">

				<div class="row mt-60 mb-40 fs-13">

					<!-- col #1 -->
					<div class="col-md-3 col-sm-3">

						<!-- Footer Logo -->
						<img class="footer-logo" src="assets/images/_smarty/logo-126x39-negro.png" alt="" />

						<!-- Small Description -->
						<p>Cualquier duda nos puede contactar por los siguientes medios.</p>

						<!-- Contact Address -->
						<address>
							<ul class="list-unstyled">
								<li class="footer-sprite address">
									PO Box 5101<br>
									Los chorros de milla, Res Tatuy<br>
								</li>
								<li class="footer-sprite phone">
									Telefono: 0424-731-5400
								</li>
								<li class="footer-sprite email">
									<a href="mailto:support@yourname.com">support@yourname.com</a>
								</li>
							</ul>
						</address>
						<!-- /Contact Address -->

					</div>
					<!-- /col #1 -->

					<!-- REDES SOCIALES -->
					<div class="col-md-4 col-sm-4">

						<h4 class="letter-spacing-1">REDES SOCIALES</h4>


						<hr />

						<!-- Social Icons -->
						<div class="clearfix">

							<a target="_blank" href="https://www.facebook.com/" class="social-icon social-icon-sm social-icon-border social-facebook float-left" data-toggle="tooltip" data-placement="top" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a target="_blank" href="https://www.twitter.com/" class="social-icon social-icon-sm social-icon-border social-twitter float-left" data-toggle="tooltip" data-placement="top" title="Twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a target="_blank" href="https://www.youtube.com/" class="social-icon social-icon-sm social-icon-border social-youtube float-left" data-toggle="tooltip" data-placement="top" title="Youtube">
								<i class="icon-youtube"></i>
								<i class="icon-youtube"></i>
							</a>

							<a target="_blank" href="https://www.instagram.com/" class="social-icon social-icon-sm social-icon-border social-instagram float-left" data-toggle="tooltip" data-placement="top" title="Instagrams">
								<i class="icon-instagram"></i>
								<i class="icon-instagram"></i>
							</a>

						</div>
						<!-- /Social Icons -->

					</div>
					<!-- /REDES SOCIALES-->

					<!-- GALERIA -->
					<div class="col-md-5">
						<h4  class="letter-spacing-1">GALERIA DE FOTOS</h4>

						<div class="footer-gallery lightbox" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>
							@foreach ($fotos as $foto)
							@if (!empty($foto->Galeria))
							<a href="{{asset('storage/imagen/foto/'.$foto->imagen)}}">
								<img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" width="106" height="70" alt="" />
							</a>
							@endif
							@endforeach
						</div>

					</div>

					</div>
					<!-- /GALERIA-->

				</div>

			</div>

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
