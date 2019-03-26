@extends('layouts.menuInicio')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Contacto</h2>
						<p class="lead font-lato">Ingresa los datos del contacto.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form action="/LaTesis/public/contactos/{{$contacto->id}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}

							<div class="row">

									<div class="col-md-6">
										<h5>Nombre</h5>
										<!-- date picker -->
										<input type="text" value="{{$contacto->nombre}}" class="form-control"  name="nombre"  placeholder="Ingrese el Nombre">

									</div>

									<div class="col-md-6">
										<h5>Email</h5>
										<!-- date picker -->
										<input type="text" value="{{$contacto->correo}}" class="form-control" name="correo"  placeholder="Ingrese el Email">

									</div>
							</div>

							<div class="row">

									<div class="col-md-4">
										<h5>Telefono</h5>
										<!-- date picker -->
										<input type="text" value="{{$contacto->Telefono}}" class="form-control"  name="Telefono"  placeholder="Ingrese el Telefono">

									</div>

									<div class="col-md-4">
										<h5>Mensaje</h5>
										<!-- date picker -->
										<input type="text" value="{{$contacto->Mensaje}}" class="form-control" name="Mensaje"  placeholder="Ingrese el Mensaje">

									</div>

									<div class="col-md-4">
										<h5>Area</h5>
										<!-- date picker -->
										<input type="text" value="{{$contacto->Area}}" class="form-control" name="Area"  placeholder="Ingrese el Area">

									</div>
							</div>

							<div class="row">

									<div class="col-md-6">
										<h5>Asunto</h5>
										<!-- date picker -->
										<input type="text" value="{{$contacto->Asunto}}" class="form-control"  name="Asunto"  placeholder="Ingrese el Asunto">

									</div>

									<div class="col-md-6">
										<h5>Archivo</h5>
										<!-- date picker -->
										<input type="text" value="{{$contacto->archivo}}" class="form-control" name="archivo"  placeholder="Ingrese el Archivo">

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
      <a href="/LaTesis/public/contactos" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
