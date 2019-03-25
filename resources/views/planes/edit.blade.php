@extends('layouts.app')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Plan</h2>
						<p class="lead font-lato">Ingresa los datos del Plan.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form action="/LaTesis/public/planes/{{$plane->id}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}

							<div class="row">

									<div class="col-md-4">
										<h5>Fecha de Inicio</h5>
										<!-- date picker -->
										<input type="text" value="{{$plane->Fecha_Inicio}}" class="form-control datepicker" name="Fecha_Inicio" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" placeholder="Ingrese la Fecha de Inicio">

									</div>

									<div class="col-md-4">
										<h5>Fecha Final</h5>
										<!-- date picker -->
										<input type="text" value="{{$plane->Fecha_Final}}" class="form-control datepicker" name="Fecha_Final" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" placeholder="Ingrese la Fecha Final">

									</div>

									<div class="col-md-4">
										<h5>Publicidad</h5>
										<!-- date picker -->
										<input type="text" value="{{$plane->Publicidad}}" class="form-control"  name="Publicidad"  placeholder="¿Tiene Publicidad?">

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
      <a href="/LaTesis/public/planes" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
