@extends('layouts.app')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Foto</h2>
						<p class="lead font-lato">Ingresa los datos de la foto.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Registrar!</em></strong></h3>


							<form action="/LaTesis/public/fotos/store" method="POST" role="form">

                {{csrf_field()}}

							  <!--<fieldset>-->
									<!--<input type="hidden" name="action" value="contact_send" />-->

									<div class="row">

											<div class="col-md-6">
	                      <h5>Titulo</h5>
	                      <!-- date picker -->
	                      <input type="text" value="{{old('title')}}" class="form-control"  name="title"  placeholder="Ingrese el Titulo">

	                    </div>

	                    <div class="col-md-6">
	                      <h5>Descripcion</h5>
	                      <!-- date picker -->
	                      <input type="text" value="{{old('descripcion')}}" class="form-control" name="descripcion"  placeholder="Ingrese la Descripcion">

	                    </div>
									</div>

									<div class="row">

											<div class="col-md-6">
	                      <h5>Imagen</h5>
	                      <!-- date picker -->
	                      <input type="text" value="{{old('imagen')}}" class="form-control"  name="imagen"  placeholder="Seleccione la Imagen">

	                    </div>

	                    <div class="col-md-6">
	                      <h5>Galeria</h5>
	                      <!-- date picker -->
	                      <input type="text" value="{{old('Galeria')}}" class="form-control" name="Galeria"  placeholder="¿Pertenece a Galeria?">

	                    </div>
									</div>

									<div class="row">

											<div class="col-md-3">
												<h5>RIF Prestador</h5>
												<!-- date picker -->
												<input type="text" value="{{old('RIF_Prest')}}" class="form-control"  name="RIF_Prest"  placeholder="Seleccione el RIF">

											</div>

											<div class="col-md-3">
												<h5>ID de la Zona</h5>
												<!-- date picker -->
												<input type="text" value="{{old('id_Zona')}}" class="form-control" name="id_Zona"  placeholder="Ingrese el ID de la Zona">

											</div>

											<div class="col-md-3">
												<h5>ID del Atractivo</h5>
												<!-- date picker -->
												<input type="text" value="{{old('id_Atrac')}}" class="form-control"  name="id_Atrac"  placeholder="Ingrese el ID del Atractivo">

											</div>

											<div class="col-md-3">
												<h5>ID de la Actividad</h5>
												<!-- date picker -->
												<input type="text" value="{{old('id_Activi')}}" class="form-control" name="id_Activi"  placeholder="Ingrese el ID de la Actividad">

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
			<a href="/LaTesis/public/fotos" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
				<span class="font-lato fs-30">

					<strong>Regresar &raquo;</strong>
				</span>
			</a>

			<!-- BUTTON CALLOUT -->
@endsection
