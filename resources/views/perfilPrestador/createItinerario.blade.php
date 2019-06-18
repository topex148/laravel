@extends('layouts.menuInicio')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Itinerario</h2>
						<p class="lead font-lato">Ingresa los datos del Itinerario.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Registrar!</em></strong></h3>


							<form action="/LaTesis/public/perfilPrestador/store/itinerario" method="POST" role="form">

                {{csrf_field()}}



									<div class="row">



																			<div class="col-md-6"><!-- select -->
																				<label for="">Id de paquete</label>
																					<select required class="form-control" name="id_P_3" value="{{old('id_P_3')}}">
																							<option value="">--- Seleccione el id del paquete ---</option>
																							@foreach ($paquetes as $paquete)
																								<option value="{{$paquete->id}}">Paquete Número: {{$paquete->id}}</option>
																							@endforeach
																					</select>
																			</div>

																			<!--<div class="col-md-4">
																				<label for="">Ingrese el numero de cliente</label>
																				<input required type="text" maxlength="4" value="{{old('id_Cliente_1')}}" class="form-control" name="id_Cliente_1" placeholder="Ingrese el numero de cliente">
																			</div>
																		-->

																		<div class="col-md-6"><!-- select -->
																			<label for="">Numero de cliente</label>
																				<select required class="form-control" name="id_Cliente_1" value="{{old('id_Cliente_1')}}">
																						<option value="">--- Seleccione el numero de cliente ---</option>
																						@foreach ($turistas as $turista)
																							<option value="{{$turista->id}}">Cliente Número: {{$turista->id}}</option>
																						@endforeach
																				</select>
																		</div>

																	</div>

																	<div class="row">
								                    <div class="col-md-6">
								                      <h5>Fecha de Inicio</h5>
								                      <!-- date picker -->
								                      <input required type="text" value="{{old('Fecha_Inicio')}}" class="form-control datepicker" name="Fecha_Inicio" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" placeholder="Ingrese la Fecha de Inicio">

								                      <br /><br />

								                    </div>

								                    <div class="col-md-6">
								                      <h5>Fecha Final</h5>
								                      <!-- date picker -->
								                      <input required type="text" value="{{old('Fecha_Final')}}" class="form-control datepicker" name="Fecha_Final" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" placeholder="Ingrese la Fecha Final">

								                      <br /><br />

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
			<a href="/LaTesis/public/perfilPrestador" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
				<span class="font-lato fs-30">

					<strong>Regresar &raquo;</strong>
				</span>
			</a>

			<!-- BUTTON CALLOUT -->
@endsection
