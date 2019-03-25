@extends('layouts.app')

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

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form action="/LaTesis/public/itinerarios/{{$itinerario->id}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}

							<div class="row">

									<div class="col-md-6">
										<h5>Usuario ID</h5>
										<!-- date picker -->
										<input type="text" value="{{$itinerario->user_id}}" class="form-control"  name="user_id"  placeholder="Ingrese el ID de Usuario">

									</div>

									<div class="col-md-6">
										<h5>RIF 4</h5>
										<!-- date picker -->
										<input type="text" value="{{$itinerario->RIF_4}}" class="form-control" name="RIF_4"  placeholder="Ingrese el RIF">

									</div>
							</div>

							<div class="row">

									<div class="col-md-6">
										<h5>ID Paquete</h5>
										<!-- date picker -->
										<input type="text" value="{{$itinerario->id_P_3}}" class="form-control"  name="id_P_3"  placeholder="Ingrese el ID del Paquete">

									</div>

									<div class="col-md-6">
										<h5>ID Cliente</h5>
										<!-- date picker -->
										<input type="text" value="{{$itinerario->id_Cliente_1}}" class="form-control" name="id_Cliente_1"  placeholder="Ingrese el ID del Cliente">

									</div>
							</div>

							<div class="row">

									<div class="col-md-6">
										<h5>Fecha de Inicio</h5>
										<!-- date picker -->
										<input type="text" value="{{$itinerario->Fecha_Inicio}}" class="form-control datepicker" name="Fecha_Inicio" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" placeholder="Ingrese la Fecha de Inicio">

									</div>

									<div class="col-md-6">
										<h5>Fecha Final</h5>
										<!-- date picker -->
										<input type="text" value="{{$itinerario->Fecha_Final}}" class="form-control datepicker" name="Fecha_Final" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" placeholder="Ingrese la Fecha Final">

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
      <a href="/LaTesis/public/itinerarios" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
