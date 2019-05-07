@extends('layouts.menuInicio')

@section('content')

<!-- CONTACT -->
			<section >
				<div class="container">

					<header class="text-center mb-60">
						<h2>Prestador {{ $prestadore->RIF }}</h2>
						<p class="lead font-lato">Estos son los datos del Prestador.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

								<div class="row">

									<div class="col-md-3">
									<td>
										<h3>Foto Prestador</h5>
										<img src="{{asset('storage/imagen/prestador/'.$prestadore->imagen)}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
									</td>
									</div>

                  <div class="col-md-3">
                    <h3>RIF</h5>
                    <!-- date picker -->
                    <p><strong>{{ $prestadore->RIF }}</strong> </p>

                  </div>

                  <div class="col-md-3">
                    <h3>Telefono</h5>
                    <!-- date picker -->
                    <p><strong>{{ $prestadore->Telefono }}</strong> </p>

                  </div>

									<div class="col-md-3">
										<h3>RTN</h5>
										<!-- date picker -->
										<p><strong>{{ $prestadore->RTN }}</strong> </p>

									</div>

								</div>

							</br>

								<div class="row">

									<div class="col-md-6">
										<h3>Descripcion Servicio</h5>
										<!-- date picker -->
										<p><strong>{{ $prestadore->DescripcionServicio }}</strong> </p>

									</div>

									<div class="col-md-6">
										<h3>Descripcion Prestador</h5>
										<!-- date picker -->
										<p><strong>{{ $prestadore->DescripcionPrestador }}</strong> </p>

									</div>

								</div>

								</br>

								<div class="row">

									<div class="col-md-6">
										<h3>Nombre</h5>
										<!-- date picker -->
										<p><strong>{{ $prestadore->Nombre }}</strong> </p>

									</div>

									<div class="col-md-6">
										<h3>Imagen</h5>
										<!-- date picker -->
										<p><strong>{{ $prestadore->imagen }}</strong> </p>

									</div>

								</div>

								</br>
								
								<div class="row">

									<div class="col-md-4">
										<h3>Facebook</h5>
										<!-- date picker -->
										<p><strong>{{ $prestadore->Facebook }}</strong> </p>

									</div>

									<div class="col-md-4">
										<h3>Twitter</h5>
										<!-- date picker -->
										<p><strong>{{ $prestadore->Twitter }}</strong> </p>

									</div>

									<div class="col-md-4">
										<h3>Instagram</h5>
										<!-- date picker -->
										<p><strong>{{ $prestadore->Instagram }}</strong> </p>

									</div>

								</div>

              </div>

					</div>

				</div>
			</section>
			<!-- /CONTACT -->

      <!-- BUTTON CALLOUT -->
      <a href="/LaTesis/public/prestadores" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">

          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
