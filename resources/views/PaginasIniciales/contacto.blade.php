@extends('layouts.menu')

@section('content')
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


							<!--
								MESSAGES

									How it works?
									The form data is posted to php/contact.php where the fields are verified!
									php.contact.php will redirect back here and will add a hash to the end of the URL:
										#alert_success 		= email sent
										#alert_failed		= email not sent - internal server error (404 error or SMTP problem)
										#alert_mandatory	= email not sent - required fields empty
										Hashes are handled by assets/js/contact.js

									Form data: required to be an array. Example:
										contact[email][required]  WHERE: [email] = field name, [required] = only if this field is required (PHP will check this)
										Also, add `required` to input fields if is a mandatory field.
										Example: <input required type="email" value="" class="form-control" name="contact[email][required]">

									PLEASE NOTE: IF YOU WANT TO ADD OR REMOVE FIELDS (EXCEPT CAPTCHA), JUST EDIT THE HTML CODE, NO NEED TO EDIT php/contact.php or javascript
												 ALL FIELDS ARE DETECTED DINAMICALY BY THE PHP

									WARNING! Do not change the `email` and `name`!
												contact[name][required] 	- should stay as it is because PHP is using it for AddReplyTo (phpmailer)
												contact[email][required] 	- should stay as it is because PHP is using it for AddReplyTo (phpmailer)
							-->

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


								<form enctype="multipart/form-data" action="/LaTesis/public/contacto" method="POST" role="form">
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
