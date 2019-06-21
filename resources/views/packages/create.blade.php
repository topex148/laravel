@extends('layouts.menuInicio')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Paquete</h2>
						<p class="lead font-lato">Ingresa los datos del paquete.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Registrar!</em></strong></h3>


							<form action="/LaTesis/public/packages/store" method="POST" role="form">

                {{csrf_field()}}

							  <!--<fieldset>-->
									<!--<input type="hidden" name="action" value="contact_send" />-->

									<div class="row">

											<div class="col-md-6">
	                      <h5>Fecha de Inicio</h5>
	                      <!-- date picker -->
	                      <input required type="text" value="{{old('Fecha_Inicio')}}" class="form-control datepicker" name="Fecha_Inicio" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" placeholder="Ingrese la Fecha de Inicio">

	                    </div>

	                    <div  required class="col-md-6">
	                      <h5>Fecha Final</h5>
	                      <!-- date picker -->
	                      <input type="text" value="{{old('Fecha_Final')}}" class="form-control datepicker" name="Fecha_Final" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" placeholder="Ingrese la Fecha Final">

	                    </div>


									</div>

									<div class="row">

											<div class="col-md-4"><!-- select -->
												<h5>Id de actividad</h5>
													<select class="form-control" name="id_Actividad" value="{{old('id_Actividad')}}">
															<option value="">--- Seleccione el id de la actividad ---</option>
															@foreach ($actividades as $actividade)
																<option value="{{$actividade->id}}">Actividad Número: {{$actividade->id}}</option>
															@endforeach
													</select>
											</div>

											<div class="col-md-4"><!-- select -->
												<h5>Id de atractivo</h5>
													<select class="form-control" name="id_Atractivo" value="{{old('id_Atractivo')}}">
															<option value="">--- Seleccione el id del atractivo ---</option>
															@foreach ($atractivos as $atractivo)
																<option value="{{$atractivo->id}}">Actividad Número: {{$atractivo->id}}</option>
															@endforeach
													</select>
											</div>

											<div class="col-md-4"><!-- select -->
												<h5>RIF del Prestador</h5>
													<select class="form-control" name="RIF" value="{{old('RIF')}}">
															<option value="">--- Seleccione el RIF del prestador ---</option>
															@foreach ($prestadores as $prestadore)
																<option value="{{$prestadore->RIF}}">Prestador Número: {{$prestadore->RIF}}</option>
															@endforeach
													</select>
											</div>

									</div>



							<!--	</fieldset>-->

								<div class="row">
									<div class="col-md-12">
										  <br /><br />
										<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Registrar</button>
									</div>
								</div>
							</form>

						</div>
						<!-- /FORM -->




					</div>

				</div>
			</section>
			<!-- /CONTACT -->
			<!-- BUTTON CALLOUT -->
			<a href="/LaTesis/public/packages" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
				<span class="font-lato fs-30">

					<strong>Regresar &raquo;</strong>
				</span>
			</a>

			<!-- BUTTON CALLOUT -->
@endsection
