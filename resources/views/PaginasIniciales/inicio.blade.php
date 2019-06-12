@extends('layouts.menu')

@section('content')

<!-- OWL SLIDER -->
    <section id="slider">

      <div class="owl-carousel buttons-autohide controlls-over m-0" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": true, "transitionStyle":"fade"}'>
        @foreach ($publicidades as $publicidad)
        <div>
          <a href="{{asset('servicioLista/'.$publicidad->RIF_Prest.'/prestador')}}">
          <img class="img-fluid" src="{{asset('storage/imagen/publicidad/'.$publicidad->imagen)}}" style="width:1800px; height:450px;">
          </a>
        </div>
        @endforeach

    </section>
    <!-- /OWL SLIDER -->

<!-- FEATURES -->
			<section id="features">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Ahora es tu turno de elegir</h2>
						<h2>Entre todas las actividades ofrecidas en Mérida</h2>
						<p class="lead font-lato">Debido a la geografía de la región, se cuentan con gran cantidad de actividades disponibles para tu entretenimiento. Te ofrecemos servicios de escalado, bicicleta, senderismo y más, todo depende de ti. </p>
						<hr />
					</header>

					<!-- FEATURED BOXES 3 -->
					<div class="row">

						@foreach ($actividades as $actividade)
						<div class="col-md-3 col-xs-6">
              <div class="text-center">
                	<div class="owl-carousel text-center owl-testimonial m-0" data-plugin-options='{"singleItem": true, "autoPlay": 4000, "navigation": false, "pagination": true, "transitionStyle":"fade"}'>
								@foreach ($fotos as $foto)
								@if (($foto->id_Activi) == ($actividade->id))
								<figure>
										<img  class="img rounded"src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" style="width:75px; height:75px;">
								</figure>
								@endif
								@endforeach
                </div>
								<h4>{{$actividade->titulo}}</h4>
							 <!-- <p>{{$actividade->descripcion}}</p>-->
							</div>
						</div>
						@endforeach


					</div>
					<!-- /FEATURED BOXES 3 -->


				</div>
			</section>
			<!-- /FEATURES -->

      <!-- PARALLAX -->
      		<section class="parallax parallax-2 section-xs" style="background-image: url('demo_files/images/vision-min.jpg');">
      				<div class="overlay dark-4"><!-- dark overlay [1 to 9 opacity] --></div>

      				<div class="container">

      					<div class="text-center">
      						<h3 class="m-0">Comparte Tus Ideas </h3>
      						<p class="font-lato fw-300 lead mt-0">No podemos resolver problemas usando el mismo tipo de pensamiento que usamos cuando los creamos.</p>


      					<ul class="mt-40 social-icons list-unstyled list-inline">
      						<li>
      							<a target="_blank" href="https://www.facebook.com/">
      								<i class="fa fa-facebook"></i>
      								<h4>Facebook</h4>
      								<span>Se Nuestro Amigo</span>
      							</a>
      						</li>
      						<li>
      							<a target="_blank" href="https://www.twitter.com/">
      								<i class="fa fa-twitter"></i>
      								<h4>Twitter</h4>
      								<span>Síguenos</span>
      							</a>
      						</li>
      						<li>
      							<a target="_blank" href="https://www.youtube.com/">
      								<i class="fa fa-youtube"></i>
      								<h4>Youtube</h4>
      								<span>Nuestro Canal</span>
      							</a>
      						</li>
      						<li>
      							<a target="_blank" href="https://www.instagram.com/">
      								<i class="fa fa-instagram"></i>
      								<h4>Instagram</h4>
      								<span> Ve Nuestras Imágenes </span>
      							</a>
      						</li>

      					</ul>
              </div>

      				</div>

      			</section>
      			<!-- /PARALLAX -->

            <!-- CONTACT -->
            			<section id="contact">
            				<div class="container">

            					<header class="text-center mb-60">
            						<h2>Contáctanos</h2>
            						<p class="lead font-lato">Contacta con nosotros para resolver cualquier duda que tengas </p>
            						<hr />
            					</header>


            					<div class="row">

            						<!-- FORM -->
            						<div class="col-md-8 col-sm-8">

            							<h3>Envíanos un mensaje o simplemente di <strong><em>Hola!</em></strong></h3>

            							<!-- Alert Success -->
            							<div id="alert_success" class="alert alert-success mb-30">
            								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            								<strong>Gracias!</strong> Tu mensaje fue enviado exitosamente!
            							</div><!-- /Alert Success -->


            							<!-- Alert Failed -->
            							<div id="alert_failed" class="alert alert-danger mb-30">
            								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            								<strong>[SMTP] Error!</strong> Error interno del servidor!
            							</div><!-- /Alert Failed -->


            							<!-- Alert Mandatory -->
            							<div id="alert_mandatory" class="alert alert-danger mb-30">
            								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            								<strong>Lo sentimos!</strong> Necesitas completar todos los campos (*) obligatorios!
            							</div><!-- /Alert Mandatory -->


            							<form action="/LaTesis/public/inicio" method="post" enctype="multipart/form-data">

            								{{csrf_field()}}

            									<div class="row">
            											<div class="col-md-4">
            												<label for="">Nombre completo *</label>
            												<input required type="text" value="{{old('nombre')}}" class="form-control" name="nombre" placeholder="Ingrese su Nombre">
            											</div>
            											<div class="col-md-4">
            												<label for="">Dirección E-mail *</label>
            												<input required type="email" value="{{old('correo')}}" class="form-control" name="correo" placeholder="Ingrese su Correo">
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
            											<div class="col-md-8">
            												<label for="">Asunto *</label>
            												<input required type="text" value="{{old('Asunto')}}" class="form-control" name="Asunto" placeholder="Ingrese el Asunto">
            											</div>
            											<div class="col-md-4">
            												<label for="">Área </label>
            												<select  required class="form-control pointer"  name="Area" value="{{old('Area')}}">
            													<option value="">--- Seleccionar ---</option>
            													<option value="Turista">Turista</option>
            													<option value="Prestador de Servicio">Prestador de Servicio</option>
            													<option value="Guía turístico">Guía turístico </option>
            												</select>
            											</div>
            									</div>
            									<div class="row">
            											<div class="col-md-12">
            												<label for="contact:message">Mensaje *</label>
            												<textarea required maxlength="10000" rows="8"  value="{{old('Mensaje')}}" class="form-control" name="Mensaje" placeholder="Ingrese el Mensaje"></textarea>
            											</div>
            									</div>
            									<div class="row">
            										<div class="col-md-12">
            											<!-- custom file upload -->
            										<label for="">Archivo</label>
            										<input class="custom-file-upload"  required type="file" name="archivo"  data-btn-text="Seleccionar Archivo" />
            										<small class="text-muted block">Tamaño de Archivo Maximo: 10Mb (zip/pdf/jpg/png)</small>

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


            						<!-- INFO -->
            						<div class="col-md-4 col-sm-4">

            							<h2>Visítanos   </h2>

            							<!--
            							Available heights
            								h-100
            								h-150
            								h-200
            								h-250
            								h-300
            								h-350
            								h-400
            								h-450
            								h-500
            								h-550
            								h-600
            							-->
            							<div id="map2" class="h-400 grayscale"></div>

            							<hr />

            							<p>
            								<span class="block"><strong><i class="fa fa-map-marker"></i> Dirección:</strong> Los Chorros de Milla, Mérida , Venezuela</span>
            								<span class="block"><strong><i class="fa fa-phone"></i> Teléfono :</strong> <a href="tel:0424-731-5400">0424-731-5400</a></span>
            								<span class="block"><strong><i class="fa fa-envelope"></i> Email:</strong> <a href="mailto:mail@yourdomain.com">mail@yourdomain.com</a></span>
            							</p>

            						</div>
            						<!-- /INFO -->

            					</div>

            				</div>
            			</section>
            			<!-- /CONTACT -->

@endsection
