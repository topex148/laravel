@extends('layouts.menuInicio')

@section('content')

<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Publicidad {{ $publicidad->id }}</h2>
						<p class="lead font-lato">Estos son los datos de la publicidad.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

								<div class="row">

									<div class="col-md-6">
									<td>
										<h3>Publicidad</h5>
										<img src="{{asset('storage/imagen/publicidad/'.$publicidad->imagen)}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
									</td>
									</div>

                  <div class="col-md-6">
                    <h3>Titulo</h5>
                    <!-- date picker -->
                    <p><strong>{{ $publicidad->title }}</strong> </p>

                  </div>

								</div>


								<div class="row">

									<div class="col-md-6">
										<h3>Fecha Final</h5>
										<!-- date picker -->
										<p><strong>{{ $publicidad->Fecha_Final }}</strong> </p>

									</div>

                  <div class="col-md-6">
                    <h3>Prestador</h5>
                    <!-- date picker -->
										@foreach ($prestadores as $prestadore)
										@if (($publicidad->RIF_Prest) == ($prestadore->RIF))
                    <p><strong>{{ $publicidad->RIF_Prest }}---{{$prestadore->Nombre}}</strong> </p>
										@endif
										@endforeach

                  </div>

								</div>


              </div>

					</div>

				</div>
			</section>
			<!-- /CONTACT -->

      <!-- BUTTON CALLOUT -->
      <a href="/LaTesis/public/publicidad" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">

          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
