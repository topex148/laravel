@extends('layouts.app')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Atractivo</h2>
						<p class="lead font-lato">Ingresa los datos del Atractivo.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Registrar!</em></strong></h3>


							<form action="/LaTesis/public/atractivos/store" method="POST" role="form">

                {{csrf_field()}}

							  <!--<fieldset>-->
									<!--<input type="hidden" name="action" value="contact_send" />-->

									<div class="row">

											<div class="col-md-6">
	                      <h5>ID de Zona</h5>
	                      <!-- date picker -->
	                      <input type="text" value="{{old('zona_id')}}" class="form-control"  name="zona_id"  placeholder="Ingrese el ID Zona">

	                    </div>

	                    <div class="col-md-6">
	                      <h5>Nombre del Atractivo</h5>
	                      <!-- date picker -->
	                      <input type="text" value="{{old('Nombre_Atractivo')}}" class="form-control" name="Nombre_Atractivo"  placeholder="Ingrese el Nombre del Atractivo">

	                    </div>
									</div>

									<div class="row">

											<div class="col-md-6">
												<h5>Ubicacion</h5>
												<!-- date picker -->
												<input type="text" value="{{old('Ubicacion')}}" class="form-control"  name="Ubicacion"  placeholder="Ingrese la Ubicacion">

											</div>

											<div class="col-md-6">
												<h5>Descripcion</h5>
												<!-- date picker -->
												<input type="text" value="{{old('Descripcion_Atractivo')}}" class="form-control" name="Descripcion_Atractivo"  placeholder="Ingrese la Descripcion">

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
			<a href="/LaTesis/public/atractivos" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
				<span class="font-lato fs-30">

					<strong>Regresar &raquo;</strong>
				</span>
			</a>

			<!-- BUTTON CALLOUT -->
@endsection
