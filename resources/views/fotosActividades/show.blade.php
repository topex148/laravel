@extends('layouts.menuInicio')

@section('content')

<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Foto {{ $foto->id }}</h2>
						<p class="lead font-lato">Estos son los datos de la foto.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

								<div class="row">

									<div class="col-md-4">
									<td>
										<h3>Foto</h5>
										<img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
									</td>
									</div>

                  <div class="col-md-4">
                    <h3>Titulo</h5>
                    <!-- date picker -->
                    <p><strong>{{ $foto->title }}</strong> </p>

                  </div>

                  <div class="col-md-4">
                    <h3>Descripcion</h5>
                    <!-- date picker -->
                    <p><strong>{{ $foto->descripcion }}</strong> </p>

                  </div>

								</div>

								<div class="row">

									<div class="col-md-6">
										<h3>Imagen</h5>
										<!-- date picker -->
										<p><strong>{{ $foto->imagen}}</strong> </p>

									</div>

									<div class="col-md-6">
										<h3>ID de la Actividad</h5>
										<!-- date picker -->
										<p><strong>{{ $foto->id_Activi }}</strong> </p>

									</div>

								</div>

							</div>


					</div>

				</div>
			</section>
			<!-- /CONTACT -->

      <!-- BUTTON CALLOUT -->
      <a href="/LaTesis/public/actividades" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">

          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
