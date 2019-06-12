@extends('layouts.menu')

@section('content')

<!-- -->
<section>
  <div class="container">
    <div class="row">


      <!-- LEFT -->
<div class="col-lg-3 col-md-3 col-sm-4">

  <div class="thumbnail text-center">
    <img class="img-fluid" src="{{asset('storage/imagen/prestador/'.$prestadore->imagen)}}" alt="" />
    <h2 class="fs-18 mt-10 mb-0">{{$prestadore->Nombre}}</h2>
    <h3 class="fs-11 mt-0 mb-10 text-muted">PRESTADOR DE SERVICIO</h3>
  </div>


  <!-- SIDE NAV -->
  <ul class="side-nav list-group mb-60" id="sidebar-nav">
    <li class="list-group-item active"><a href='{{asset('servicioLista/'.$prestadore->RIF.'/prestador')}}'><i class="fa fa-eye"></i> Perfil</a></li>
    @if(Auth::guest())
    <li class="list-group-item active"><a href='#'><i class="fa fa-comments-o"></i> Registrate para contactarme</a></li>
    <li class="list-group-item active"><a href="#"><i class="fa fa-tasks"></i> Registrate para generar itinerario</a></li>
    @endif

    @if(Auth::check())
    <li class="list-group-item active"><a href='{{asset('servicioLista/'.$prestadore->RIF.'/prestador/contactar')}}'><i class="fa fa-comments-o"></i> Contactar</a></li>
    <li class="list-group-item active"><a href='{{asset('servicioLista/'.$prestadore->RIF.'/prestador/itinerario')}}'><i class="fa fa-tasks"></i> Generar Itinerario</a></li>
    @endif
  </ul>
  <!-- /SIDE NAV -->


  <!-- info -->
  <div class="box-light mb-30"><!-- .box-light OR .box-light -->

    <!-- /info -->

    <div class="text-muted">
      <h2 class="fs-18 text-muted mb-6"><b>Redes Sociales</b> </h2>
      <!-- <p>Estas son las redes sociales donde puedes contactar conmigo.</p>-->

      <ul class="list-unstyled m-0">
        <li class="mb-10"><i class="fa fa-instagram fw-20 hidden-xs-down hidden-sm"></i> <a href="{{$prestadore->Instagram}}">{{$prestadore->Instagram}}</a></li>
        <li class="mb-10"><i class="fa fa-facebook fw-20 hidden-xs-down hidden-sm"></i> <a href="{{$prestadore->Facebook}}">{{$prestadore->Facebook}}</a></li>
        <li class="mb-10"><i class="fa fa-twitter fw-20 hidden-xs-down hidden-sm"></i> <a href="{{$prestadore->Twitter}}">{{$prestadore->Twitter}}</a></li>
      </ul>
    </div>

  </div>

</div>

<!-- RIGHT -->
<div class="col-lg-9 col-md-9 col-sm-8">
	<div class="box-light"><!-- .box-light OR .box-dark -->
	<div class="box-inner">
	<div class="container">

		<header class="text-center mb-60">
			<h2>Planilla de Contacto</h2>
			<p class="lead font-lato">Por medio de esta plantilla puedes contactar con el prestador de servicio y resolver cualquier duda que tengas </p>
			<hr />
		</header>


		<div class="row">

			<!-- FORM -->
			<div class="col-md-12 col-sm-8">

				<h3>Envíanos un mensaje o simplemente di <strong><em>Hola!</em></strong></h3>



					<form enctype="multipart/form-data" action="/LaTesis/public/servicioLista/{{$prestadore->RIF}}/prestador/contactar" method="POST" role="form">
					{{csrf_field()}}

						<div class="row">
								<div class="col-md-4">
									<label for="">Nombre completo *</label>
									<input required type="text" value="{{$usuarios->name}}" class="form-control" name="nombre" placeholder="{{$usuarios->name}}">
								</div>
								<div class="col-md-4">
									<label for="">Dirección E-mail *</label>
									<input required type="email" value="{{$usuarios->email}}" class="form-control" name="correo" placeholder="{{$usuarios->email}}">
								</div>
								<div class="col-md-4">
									<label for="">Teléfono </label>
									<div class="fancy-form">
									<i class="fa fa-phone-square"></i>
									<input required type="text"  maxlength="10" class="form-control masked" data-format="(999) 999-9999" data-placeholder="X" value="{{old('Telefono')}}"  name="Telefono" placeholder="Ingrese su Numero de Telefono">
								</div>
								</div>
						</div>
						<div class="row">
								<div class="col-md-12">
									<label for="">Asunto *</label>
									<input required type="text" value="{{old('Asunto')}}" class="form-control" name="Asunto" placeholder="Ingrese el Asunto">
								</div>
						</div>

						<div class="row">
								<div class="col-md-12">
									<label for="contact:message">Mensaje *</label>
									<textarea required maxlength="10000" rows="8"  value="{{old('Mensaje')}}" class="form-control" name="Mensaje" placeholder="Ingrese el Mensaje"></textarea>
								</div>
						</div>


					</fieldset>

					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> ENVIAR MENSAJE</button>
						</div>
					</div>
				</form>

			</div>
			<!-- /FORM -->


		</div>

	</div>


	</div>
	</div>

	</div>

    </div>
  </div>
</section>
<!-- / -->



@endsection
