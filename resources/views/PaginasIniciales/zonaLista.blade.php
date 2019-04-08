@extends('layouts.menu')

@section('content')
<!-- OWL SLIDER -->
    <section id="slider">

      <div class="owl-carousel buttons-autohide controlls-over m-0" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": true, "transitionStyle":"fade"}'>
        <div>
          <img class="img-fluid" src="demo_files/images/panorama/1-min.jpg" alt="">
        </div>
        <div>
          <img class="img-fluid" src="demo_files/images/panorama/2-min.jpg" alt="">
        </div>
      </div>

    </section>
    <!-- /OWL SLIDER -->

    <!-- -->
			@foreach ($zonas as $notes)
			<section>

				<div class="container">

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
              <div class="text-center">
								<div class="owl-carousel text-center owl-testimonial m-0" data-plugin-options='{"singleItem": true, "autoPlay": 4000, "navigation": false, "pagination": true, "transitionStyle":"fade"}'>
						@foreach ($fotos as $foto)
						@if (($notes->id) == ($foto->id_Zona))

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
								<h3>Zona {{$notes->id}}</h3>
							</div>
							<h4>{{$notes->nombre}}</h4>
							<p>{{$notes->Descripcion_Zona}}</p>

							<td>
									<a href="zonaLista/{{$notes->id}}/zona" class="btn btn-primary"><i class="fa fa-check"></i> CONOCE MAS </a>
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
