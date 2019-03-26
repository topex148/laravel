@extends('layouts.menuInicio')

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

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form action="/LaTesis/public/atractivos/{{$atractivo->id}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}


							<div class="row">

								<div class="col-md-6"><!-- select -->
									<label for="">ID Zona</label>
									<select class="form-control" name="zona_id" value="{{$atractivo->zona_id}}">
										<option value="{{$atractivo->zona_id}}">Zona-{{$atractivo->zona_id}}</option>
										@foreach ($zonas as $zona)
											<option value="{{$zona->id}}">{{$zona->id}}-{{$zona->nombre}}</option>
										@endforeach
									</select>

									</div>

									<div class="col-md-6">
										<h5>Nombre del Atractivo</h5>
										<!-- date picker -->
										<input type="text" value="{{$atractivo->Nombre_Atractivo}}" class="form-control" name="Nombre_Atractivo"  placeholder="Ingrese el Nombre del Atractivo">

									</div>
							</div>

							<div class="row">

									<div class="col-md-6">
										<h5>Ubicacion</h5>
										<!-- date picker -->
										<input type="text" value="{{$atractivo->Ubicacion}}" class="form-control"  name="Ubicacion"  placeholder="Ingrese la Ubicacion">

									</div>

									<div class="col-md-6">
										<h5>Descripcion</h5>
										<!-- date picker -->
										<input type="text" value="{{$atractivo->Descripcion_Atractivo}}" class="form-control" name="Descripcion_Atractivo"  placeholder="Ingrese la Descripcion">

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
      <a href="/LaTesis/public/atractivos" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
