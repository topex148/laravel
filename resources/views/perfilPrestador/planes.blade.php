@extends('layouts.menuInicio')

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

			<!-- FEATURED -->

				<div class="container">
					<div class="row">

						<div class="col-lg-12 col-md-12 col-sm-8">
							<h2 class="owl-featured b-0"><strong>PLANES DE </strong> ALOJAMIENTO Y <strong>PROMOCION</strong></h2>
							</br>
							<div class="owl-carousel featured m-0 owl-padding-10" data-plugin-options='{"loop":true,"singleItem": false, "items": "4", "stopOnHover":false, "autoPlay":4000, "autoHeight": false, "navigation": true, "pagination": false}'>


								<!-- item -->
								<div class="shop-item m-1">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" >
											<img class="img-fluid" src="{{asset('assets/images/publicidad/PlanDeAlojamiento.png')}}" style="width:300px; height:450px;" alt="shop first image" />
										</a>
										<!-- /product image(s) -->

									</div>

									<div class="shop-item-summary text-center">
										<h3>Plan Mensual</h3>
										<h2>Este plan te permite alojarte por un mes en esta plataforma.</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-5 fs-13"><!-- rating-0 ... rating-5 --></div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">

											$10
										</div>
										<!-- /price -->
									</div>

									<form enctype="multipart/form-data" action="/LaTesis/public/plan/pago1" method="POST">
											{{ csrf_field() }}
											<script
													src="https://checkout.stripe.com/checkout.js" class="stripe-button"
													name="plan"
													value="monthly"
													data-key="{{ config('services.stripe.key') }}"
													data-amount="1000"
													data-name="Subscribir"
													data-description="Subscripcion mensual"
													data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
													data-locale="auto">
											</script>
									</form>

								</div>
								<!-- /item -->

								<!-- item -->
								<div class="shop-item m-2">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" >
											<img class="img-fluid" src="{{asset('assets/images/publicidad/PlanDeAlojamiento.png')}}" style="width:300px; height:450px;" alt="shop first image" />
										</a>
										<!-- /product image(s) -->

									</div>

									<div class="shop-item-summary text-center">
										<h3>Plan Anual</h3>
										<h2>Este plan te permite alojarte por un año en esta plataforma.</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-5 fs-13"><!-- rating-0 ... rating-5 --></div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">

											$100
										</div>
										<!-- /price -->
									</div>

									<form enctype="multipart/form-data" action="/LaTesis/public/plan/pago2" method="POST">
											{{ csrf_field() }}
											<script
													src="https://checkout.stripe.com/checkout.js" class="stripe-button"
													name="plan"
													value="yearly"
													data-key="{{ config('services.stripe.key') }}"
													data-amount="10000"
													data-name="Subscribir"
													data-description="Subscripcion anual"
													data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
													data-locale="auto">
											</script>
									</form>

								</div>
								<!-- /item -->

								<!-- item -->
								<div class="shop-item m-3">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" >
											<img class="img-fluid" src="{{asset('assets/images/publicidad/PlanDePromocion.png')}}" style="width:300px; height:450px;" alt="shop first image" />
										</a>
										<!-- /product image(s) -->

									</div>

									<div class="shop-item-summary text-center">
										<h3>Plan Mensual</h3>
										<h2>Este plan te permite alojarte por un mes en esta plataforma.</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-5 fs-13"><!-- rating-0 ... rating-5 --></div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">

											$10
										</div>
										<!-- /price -->
									</div>

									<form enctype="multipart/form-data" action="/LaTesis/public/plan/pago1" method="POST">
											{{ csrf_field() }}
											<script
													src="https://checkout.stripe.com/checkout.js" class="stripe-button"
													name="plan"
													value="monthly"
													data-key="{{ config('services.stripe.key') }}"
													data-amount="1000"
													data-name="Subscribir"
													data-description="Subscripcion mensual"
													data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
													data-locale="auto">
											</script>
									</form>

								</div>
								<!-- /item -->

								<!-- item -->
								<div class="shop-item m-4">

									<div class="thumbnail">
										<!-- product image(s) -->
										<a class="shop-item-image" >
											<img class="img-fluid" src="{{asset('assets/images/publicidad/PlanDePromocion.png')}}" style="width:300px; height:450px;" alt="shop first image" />
										</a>
										<!-- /product image(s) -->

									</div>

									<div class="shop-item-summary text-center">
										<h3>Plan Anual</h3>
										<h2>Este plan te permite alojarte por un año en esta plataforma.</h2>

										<!-- rating -->
										<div class="shop-item-rating-line">
											<div class="rating rating-5 fs-13"><!-- rating-0 ... rating-5 --></div>
										</div>
										<!-- /rating -->

										<!-- price -->
										<div class="shop-item-price">

											$100
										</div>
										<!-- /price -->
									</div>

									<form enctype="multipart/form-data" action="/LaTesis/public/plan/pago2" method="POST">
											{{ csrf_field() }}
											<script
													src="https://checkout.stripe.com/checkout.js" class="stripe-button"
													name="plan"
													value="yearly"
													data-key="{{ config('services.stripe.key') }}"
													data-amount="10000"
													data-name="Subscribir"
													data-description="Subscripcion anual"
													data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
													data-locale="auto">
											</script>
									</form>

								</div>
								<!-- /item -->

						</div>
						</div>

				</div>
				</div>

</section>

@endsection
