@extends('layouts.menuInicio')

@section('content')

<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Atractivo {{ $atractivo->id }}</h2>
						<p class="lead font-lato">Estos son los datos del atractivo.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

								<div class="row">

                  <div class="col-md-6">
                    <h3>ID de Zona</h5>
                    <!-- date picker -->
                    <p><strong>{{ $atractivo->zona_id }}</strong> </p>

                  </div>

                  <div class="col-md-6">
                    <h3>Nombre del Atractivo</h5>
                    <!-- date picker -->
                    <p><strong>{{ $atractivo->Nombre_Atractivo }}</strong> </p>

                  </div>

								</div>

								<div class="row">

									<div class="col-md-6">
										<h3>Ubicacion</h5>
										<!-- date picker -->
										<p><strong>{{ $atractivo->Ubicacion }}</strong> </p>

									</div>

									<div class="col-md-6">
										<h3>Descripcion</h5>
										<!-- date picker -->
										<p><strong>{{ $atractivo->Descripcion_Atractivo }}</strong> </p>

									</div>

								</div>

              </div>

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
