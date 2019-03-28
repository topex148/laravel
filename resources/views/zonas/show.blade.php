@extends('layouts.menuInicio')

@section('content')

<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Zona {{ $zona->id }}</h2>
						<p class="lead font-lato">Estos son los datos de la Zona.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

								<div class="row">

                  <div class="col-md-6">
                    <h3>Nombre</h5>
                    <!-- date picker -->
                    <p><strong>{{ $zona->nombre }}</strong> </p>

                  </div>

                  <div class="col-md-6">
                    <h3>Descripcion de la Zona</h5>
                    <!-- date picker -->
                    <p><strong>{{ $zona->Descripcion_Zona }}</strong> </p>

                  </div>

								</div>

              </div>

					</div>

				</div>
			</section>
			<!-- /CONTACT -->

      <!-- BUTTON CALLOUT -->
      <a href="/LaTesis/public/zonas" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">

          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
