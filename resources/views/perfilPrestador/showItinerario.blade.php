@extends('layouts.menuInicio')

@section('content')
@if (($itinerario->RIF_4) == (\Auth::user()->RIF_Prest))
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Itinerario {{ $itinerario->id }}</h2>
						<p class="lead font-lato">Estos son los datos del Itinerario.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

								<div class="row">

                  <div class="col-md-3">
                    <h3>Usuario ID</h5>
                    <!-- date picker -->
                    <p><strong>{{ $itinerario->user_id }}</strong> </p>

                  </div>

                  <div class="col-md-3">
                    <h3>RIF 4</h5>
                    <!-- date picker -->
                    <p><strong>{{ $itinerario->RIF_4 }}</strong> </p>

                  </div>

									<div class="col-md-3">
                    <h3>ID Paquete</h5>
                    <!-- date picker -->
                    <p><strong>{{ $itinerario->id_P_3 }}</strong> </p>

                  </div>

								</div>

								<div class="row">

									<div class="col-md-3">
										<h3>ID Cliente</h5>
										<!-- date picker -->
										<p><strong>{{ $itinerario->id_Cliente_1 }}</strong> </p>

									</div>

									<div class="col-md-3">
										<h3>Fecha Inicio</h5>
										<!-- date picker -->
										<p><strong>{{ $itinerario->Fecha_Inicio }}</strong> </p>

									</div>

									<div class="col-md-3">
										<h3>Fecha Final</h5>
										<!-- date picker -->
										<p><strong>{{ $itinerario->Fecha_Final }}</strong> </p>

									</div>

								</div>

              </div>

					</div>

				</div>
			</section>
			<!-- /CONTACT -->

      <!-- BUTTON CALLOUT -->
      <a href="/LaTesis/public/perfilPrestador" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">

          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->
      @endif

      @if (($itinerario->RIF_4) != (\Auth::user()->RIF_Prest))
      <!-- -->
      <section>
        <div class="container">

          <div class="row">

            <div class="col-lg-5 col-md-5 col-sm-5">

              <img class="img-fluid" src="{{ asset("demo_files/images/girl_looking-min.jpg") }}" alt="">

            </div>

            <div class="col-lg-7 col-md-7 col-sm-7">
              <h2> ERROR</h2>


              <h3>403 - Acción no autorizada</h3>

              <p>Le recomendamos no ingresar a sitios no autorizados. </p>
            </div>

          </div>
          <hr />

        </div>
      </section>
      <!-- / -->

      @endif

@endsection
