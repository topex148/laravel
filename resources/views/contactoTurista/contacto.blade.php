@extends('layouts.menu')

@section('content')
<!-- CONTACT -->
			<section id="contact">
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
										<div class="col-md-6"><!-- select -->
											<label for="">Dirigido a</label>
												<select class="form-control" name="name" value="{{$prestadore->Nombre}}">
														<option value="{{$prestadore->Nombre}}">--- {{$prestadore->Nombre}} ---</option>

															<option value="{{$prestadore->Nombre}}">{{$prestadore->Nombre}}</option>

												</select>
										</div>

											@foreach ($user as $usuarios)
		                  @if (($usuarios->RIF_Prest) == ($prestadore->RIF))
											<div class="col-md-6"><!-- select -->
												<label for="">A la Dirección E-mail *</label>
													<select class="form-control" name="email" value="{{$usuarios->email}}">
															<option value="{{$usuarios->email}}">--- {{$usuarios->email}} ---</option>

																<option value="{{$usuarios->email}}">{{$usuarios->email}}</option>

													</select>
											</div>
											@endif
		                  @endforeach

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
			</section>
			<!-- /CONTACT -->
@endsection
