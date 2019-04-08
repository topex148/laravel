@extends('layouts.menu')

@section('content')
<!-- -->
			@foreach ($atractivos as $notes)
			<section>

				<div class="container">

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<div class="text-center">
								<div class="owl-carousel text-center owl-testimonial m-0" data-plugin-options='{"singleItem": true, "autoPlay": 4000, "navigation": false, "pagination": true, "transitionStyle":"fade"}'>
						@foreach ($fotos as $foto)
						@if (($notes->id) == ($foto->id_Atrac))



							<!-- OWL SLIDER -->

								<figure>
									<img class="img rounded" src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" alt="" style="width:400px; height:400px">
								</figure>

							<!-- /OWL SLIDER -->

						@endif
						@endforeach
						</div>
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
