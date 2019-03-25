@extends('layouts.app')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Prestador</h2>
						<p class="lead font-lato">Ingresa los datos del Prestador.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form action="/LaTesis/public/prestadores/{{$prestadore->RIF}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}

							<div class="row">

									<div class="col-md-4">
										<h5>RIF</h5>
										<!-- date picker -->
										<input type="text" value="{{$prestadore->RIF}}" class="form-control"  name="RIF"  placeholder="Ingrese el RIF">

									</div>

									<div class="col-md-4">
										<h5>Telefono</h5>
										<!-- date picker -->
										<input type="text" value="{{$prestadore->Telefono}}" class="form-control" name="Telefono"
										 placeholder="Ingrese el Telefono">

									</div>

									<div class="col-md-4">
										<h5>RTN</h5>
										<!-- date picker -->
										<input type="text" value="{{$prestadore->RTN}}" class="form-control" name="RTN"
										placeholder="Ingrese el RTN">

									</div>

							</div>

							<div class="row">

									<div class="col-md-6">
										<h5>Descripcion Servicio</h5>
										<!-- date picker -->
										<input type="text" value="{{$prestadore->DescripcionServicio}}"
										class="form-control"  name="DescripcionServicio"
										 placeholder="Ingrese la Descripcion del Servicio">

									</div>

									<div class="col-md-6">
										<h5>Descripcion Prestador</h5>
										<!-- date picker -->
										<input type="text" value="{{$prestadore->DescripcionPrestador}}"
										class="form-control" name="DescripcionPrestador"
										placeholder="Ingrese la Descripcion del Prestador">

									</div>

							</div>

							<div class="row">

									<div class="col-md-6">
										<h5>Nombre</h5>
										<!-- date picker -->
										<input type="text" value="{{$prestadore->Nombre}}" class="form-control"  name="Nombre"
										placeholder="Ingrese el Nombre">

									</div>

									<div class="col-md-6">
										<h5>Imagen</h5>
										<!-- date picker -->
										<input type="text" value="{{$prestadore->imagen}}" class="form-control" name="imagen"
										 placeholder="Ingrese la Imagen">

									</div>

							</div>

							<div class="row">

									<div class="col-md-4">
										<h5>Facebook</h5>
										<!-- date picker -->
										<input type="text" value="{{$prestadore->Facebook}}" class="form-control"  name="Facebook"  placeholder="Ingrese el Facebook">

									</div>

									<div class="col-md-4">
										<h5>Twitter</h5>
										<!-- date picker -->
										<input type="text" value="{{$prestadore->Twitter}}" class="form-control" name="Twitter"  placeholder="Ingrese el Twitter">

									</div>

									<div class="col-md-4">
										<h5>Instagram</h5>
										<!-- date picker -->
										<input type="text" value="{{$prestadore->Instagram}}" class="form-control" name="Instagram"  placeholder="Ingrese el Instagram">

									</div>

							</div>

							<!--	</fieldset>-->

								<div class="row">
									<div class="col-md-12">
										  <br /><br />
										<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Actualizar</button>
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
      <a href="/LaTesis/public/prestadores" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
