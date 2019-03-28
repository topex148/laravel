@extends('layouts.menuInicio')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Turista</h2>
						<p class="lead font-lato">Ingresa los datos del Turista.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form action="/LaTesis/public/turistas/{{$turista->id}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}

							<div class="row">

									<div class="col-md-6">
										<h5>Pais de Procedencia</h5>
										<!-- date picker -->
										<input type="text" value="{{$turista->Pais_P}}" class="form-control"  name="Pais_P"  placeholder="Ingrese el Pais de Procedencia">

									</div>

									<div class="col-md-6">
										<h5>Fecha Final</h5>
										<!-- date picker -->
										<input type="text" value="{{$turista->Estado_P}}" class="form-control" name="Estado_P"  placeholder="Ingrese el Estado de Procedencia">

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
      <a href="/LaTesis/public/turistas" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
