@extends('layouts.menu')

@section('content')

<section>
<!-- FEATURES -->

				<div class="container">

					<header class="text-center mb-60">
						<h2>Ahora es tu turno de elegir</h2>
						<h2>Entre los distintos planes que te ofrecemos en Meriventura</h2>
						<p class="lead font-lato">En Meriventura te ofrecemos planes de alojamiento y publicidad para que puedas dar a conocer tu negocio y el servicio que prestas. Crece junto a nosotros.  </p>
						<hr />
					</header>

				</div>

			<!-- /FEATURES -->




			<div class="container">
				<div class="row">
					<div class="owl-carousel featured m-0 owl-padding-10" data-plugin-options='{"loop":true,"singleItem": false, "items": "4", "stopOnHover":false, "autoPlay":4000, "autoHeight": false, "navigation": true, "pagination": false}'>
				@foreach ($planes as $notes)

				<!-- item -->
				<div class="shop-item m-1">

					<div class="thumbnail">
						<!-- product image(s) -->
						<a class="shop-item-image" >
							<img class="img-fluid" src="{{asset('storage/imagen/plan/'.$notes->imagen)}}" style="width:300px; height:450px;"  />
						</a>
						<!-- /product image(s) -->

					</div>

					<div class="shop-item-summary text-center">
						<h3>Plan: {{$notes->name}} </h3>
						<h2>{{$notes->descripcion}}</h2>

						<!-- rating -->
						<div class="shop-item-rating-line">
							<div class="rating rating-5 fs-13"><!-- rating-0 ... rating-5 --></div>
						</div>
						<!-- /rating -->

						<!-- price -->
						<div class="shop-item-price">

							Precio: {{$notes->precio}}$
						</div>
						<!-- /price -->
					</div>

				</div>
				<!-- /item -->

				@endforeach
	      </div>
				</div>
				</div>



</section>

@endsection
