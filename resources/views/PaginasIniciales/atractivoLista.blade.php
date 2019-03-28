@extends('layouts.menu')

@section('content')
<!-- -->
			@foreach ($atractivos as $notes)
			<section>

				<div class="container">

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="owl-carousel buttons-autohide controlls-over m-0 box-shadow-1" data-plugin-options='{"items": 1, "autoHeight": true, "navigation": true, "pagination": true, "transitionStyle":"fade", "progressBar":"true"}'>
						@foreach ($fotos as $foto)
						@if (($notes->id) == ($foto->id_Atrac))



							<!-- OWL SLIDER -->

								<div>
									<img class="img-fluid" src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" alt="" style="width:400px; height:400px">
								</div>

							<!-- /OWL SLIDER -->

						@endif
						@endforeach
						</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="heading-title heading-border-bottom">
								<h3>Atractivo {{$notes->id}}</h3>
							</div>
							<h4>{{$notes->Nombre_Atractivo}}</h4>
							<p>{{$notes->Descripcion_Atractivo}}</p>
							@foreach ($zonas as $zona)
					    @if (($notes->zona_id) == ($zona->id))
					    <h4>Pertenece a la Zona {{$notes->zona_id}}: {{$zona->nombre}}</h4>
							@endif
							@endforeach

							<br></br>
							<td>
									<a href="atractivoLista/{{$notes->id}}/atractivo" class="btn btn-primary"><i class="fa fa-check"></i> CONOCE MAS </a>
							</td>



						</div>


					</div>

				</div>

				<br /><br />
				<br /><br />


			</section>
			@endforeach
			<!-- / -->

@endsection
