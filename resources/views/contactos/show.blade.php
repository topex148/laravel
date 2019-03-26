@extends('layouts.menuInicio')

@section('content')

<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Contacto {{ $contacto->id }}</h2>
						<p class="lead font-lato">Estos son los datos del contacto.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

								<div class="row">

                  <div class="col-md-6">
                    <h3>Nombre</h5>
                    <!-- date picker -->
                    <p><strong>{{ $contacto->nombre }}</strong> </p>

                  </div>

                  <div class="col-md-6">
                    <h3>Email</h5>
                    <!-- date picker -->
                    <p><strong>{{ $contacto->correo }}</strong> </p>

                  </div>

								</div>

								<div class="row">

									<div class="col-md-4">
										<h3>Telefono</h5>
										<!-- date picker -->
										<p><strong>{{ $contacto->Telefono }}</strong> </p>

									</div>

									<div class="col-md-4">
										<h3>Mensaje</h5>
										<!-- date picker -->
										<p><strong>{{ $contacto->Mensaje }}</strong> </p>

									</div>

									<div class="col-md-4">
										<h3>Area</h5>
										<!-- date picker -->
										<p><strong>{{ $contacto->Area }}</strong> </p>

									</div>

								</div>

								<div class="row">

									<div class="col-md-6">
										<h3>Asunto</h5>
										<!-- date picker -->
										<p><strong>{{ $contacto->Asunto }}</strong> </p>

									</div>

									<div class="col-md-6">
										<h3>Archivo</h5>
										<!-- date picker -->
										<p><strong>{{ $contacto->archivo }}</strong> </p>

									</div>

								</div>

              </div>

					</div>

				</div>
			</section>
			<!-- /CONTACT -->

      <!-- BUTTON CALLOUT -->
      <a href="/LaTesis/public/contactos" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">

          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
