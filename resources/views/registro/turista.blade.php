@extends('layouts.menuInicio')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Turista</h2>
						<p class="lead font-lato">Ingresa sus datos como Turista.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Registrar!</em></strong></h3>


							<form action="/LaTesis/public/registro/turista" method="POST" role="form">

                {{csrf_field()}}

							  <!--<fieldset>-->
									<!--<input type="hidden" name="action" value="contact_send" />-->

									<div class="row">

											<div class="col-md-6">
	                      <h5>Pais de Procedencia</h5>
	                      <!-- date picker -->
	                      <input type="text" value="{{old('Pais_P')}}" class="form-control"  name="Pais_P"  placeholder="Ingrese el Pais de Procedencia">

	                    </div>

	                    <div class="col-md-6">
	                      <h5>Estado de Procedencia</h5>
	                      <!-- date picker -->
	                      <input type="text" value="{{old('Estado_P')}}" class="form-control" name="Estado_P"  placeholder="Ingrese el Estado de Procedencia">

	                    </div>
									</div>

                  <div class="row">

                      <div class="col-md-6">
                        <h5>Edad</h5>

                        <input  required type="text" value="{{old('edad')}}" min="0" max="100" class="form-control stepper" name="edad"  placeholder="Ingrese su edad">

                      </div>

                      <div class="col-md-6">
												<h5>Genero </h5>
												<select  required class="form-control pointer"  name="genero" value="{{old('genero')}}">
													<option value="">--- Seleccione Genero ---</option>
													<option value="Masculino">Masculino</option>
													<option value="Femenino">Femenino</option>
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
			<a href="/LaTesis/public/registro" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
				<span class="font-lato fs-30">

					<strong>Regresar &raquo;</strong>
				</span>
			</a>

			<!-- BUTTON CALLOUT -->
@endsection
