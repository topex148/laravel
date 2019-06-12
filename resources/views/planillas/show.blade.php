@extends('layouts.menuInicio')

@section('content')

<!-- CONTACT -->
			<section >
				<div class="container">

					<header class="text-center mb-60">
						<h2>Contacto {{$contacto->id}}</h2>
						<p class="lead font-lato">Estos son los datos de Contacto.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

								<div class="row">


                  <div class="col-md-4">
                    <h3>Nombre</h5>
                    <!-- date picker -->
                    <p><strong>{{$contacto->usuarioNombre}}</strong> </p>

                  </div>

                  <div class="col-md-4">
                    <h3>Correo</h5>
                    <!-- date picker -->
                    <p><strong>{{$contacto->usuarioCorreo}}</strong> </p>

                  </div>

									<div class="col-md-4">
										<h3>Archivo</h5>
										<!-- date picker -->
										<p><strong>{{$contacto->imagen}}</strong> </p>

									</div>

								</div>

								</div>

              </div>

					</div>

				</div>
			</section>
			<!-- /CONTACT -->

      <!-- BUTTON CALLOUT -->
      <a href="/LaTesis/public/prestadores/contacto" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">

          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
