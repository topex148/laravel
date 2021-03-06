@extends('layouts.menuInicio')

@section('content')
@if (($foto->RIF_Prest) == ($prestador->RIF))
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

									<div class="col-md-6">
									<td>
										<h3>Foto</h5>
										<img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
									</td>
									</div>

									<div class="col-md-6">
										<h3>Imagen</h5>
										<!-- date picker -->
										<p><strong>{{ $foto->imagen}}</strong> </p>

									</div>


								</div>

								<div class="row">


									<div class="col-md-6">
                    <h3>Titulo</h5>
                    <!-- date picker -->
                    <p><strong>{{ $foto->title }}</strong> </p>

                  </div>

                  <div class="col-md-6">
                    <h3>Descripcion</h5>
                    <!-- date picker -->
                    <p><strong>{{ $foto->descripcion }}</strong> </p>

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

			@if (($foto->RIF_Prest) != ($prestador->RIF))
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
