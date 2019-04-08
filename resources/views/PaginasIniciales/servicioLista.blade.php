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
<!-- FEATURES -->
			<section id="features">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Ahora es tu turno de elegir</h2>
						<h2>Entre todas los servicios ofrecidos en Mérida</h2>
						<p class="lead font-lato">Debido a la geografía de la región, se cuentan con gran cantidad de actividades disponibles para tu entretenimiento. Te ofrecemos servicios de escalado, bicicleta, senderismo y más, todo depende de ti. </p>
					</header>

				</div>
			</section>
			<!-- /FEATURES -->




				<div class="row">



									<!-- POPULAR POSTS -->
									<div class="col-lg-6 col-md-6 col-sm-6">

										<div class="box-inner">
											<h3>
												<a class="float-right fs-11 text-warning" href="#">VER TODOS</a>
												LISTA DE SERVICIOS
											</h3>

											<div class="h-250 slimscroll" data-always-visible="true" data-size="5px" data-position="right" data-opacity="0.4" disable-body-scroll="true">

												@foreach ($prestadores as $notes)
												<div class="clearfix mb-10"><!-- post item -->
													<img class="thumbnail float-left" src="{{asset('storage/imagen/prestador/'.$notes->imagen)}}" width="60" height="60" alt="" />
													<h4 class="fs-13 m-0 b-0 p-0"><a href="servicioLista/{{$notes->RIF}}/prestador">{{$notes->Nombre}}</a></h4>
													<span class="fs-11 text-muted">{{$notes->Telefono}}</span>
												</div><!-- /post item -->
												@endforeach

											</div>
										</div>

										<div class="box-footer">
											<!-- INLINE SEARCH -->
											<div class="inline-search clearfix">
												<form action="#" method="get" class="widget_search m-0">
													<input type="search" placeholder="Search Post..." name="s" class="serch-input">
													<button type="submit">
														<i class="fa fa-search"></i>
													</button>
													<div class="clear"></div>
												</form>
											</div>
											<!-- /INLINE SEARCH -->

										</div>

									</div>
									<!-- /POPULAR POSTS -->

										<div class="col-lg-5 col-md-6 col-sm-6">

											<img class="img-fluid" src="demo_files/images/girl_looking-min.jpg" alt="">

										</div>

								</div>

@endsection
