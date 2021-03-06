@extends('layouts.menuInicio')

@section('content')

<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Plan {{ $plane->id }}</h2>
						<p class="lead font-lato">Estos son los datos del plan.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<div class="row">

								<div class="col-md-3">
								<td>
									<h3>Foto Plan</h5>
									<img src="{{asset('storage/imagen/plan/'.$plane->imagen)}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
								</td>
								</div>

								<div class="col-md-3">
									<h3>Nombre</h5>
									<!-- date picker -->
									<p><strong>{{ $plane->name }}</strong> </p>

								</div>

								<div class="col-md-3">
									<h3>Descripcion</h5>
									<!-- date picker -->
									<p><strong>{{ $plane->descripcion }}</strong> </p>

								</div>

								<div class="col-md-3">
									<h3>Precio</h5>
									<!-- date picker -->
									<p><strong>{{ $plane->precio }}</strong> </p>

								</div>


							</div>

						</br>

								<div class="row">

                  <div class="col-md-3">
                    <h3>Fecha de Inicio</h5>
                    <!-- date picker -->
                    <p><strong>{{ $plane->Fecha_Inicio }}</strong> </p>

                  </div>

                  <div class="col-md-3">
                    <h3>Fecha Final</h5>
                    <!-- date picker -->
                    <p><strong>{{ $plane->Fecha_Final }}</strong> </p>

                  </div>

									<div class="col-md-3">
										<h3>Plan al que pertenece</h5>
										<!-- date picker -->
										<p><strong>{{ $plane->Publicidad }}</strong> </p>

									</div>

								</div>

              </div>

					</div>

				</div>
			</section>
			<!-- /CONTACT -->

      <!-- BUTTON CALLOUT -->
      <a href="/LaTesis/public/planes" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">

          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
