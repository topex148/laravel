@extends('layouts.menu')

@section('content')
<!-- TITULO 1-->
<section>
<div class="container">
	<header class="text-center mb-60">
		<h2>Ahora es tu turno de elegir</h2>
		<h2>Entre todas las actividades ofrecidas en Mérida</h2>
		<p class="lead font-lato">Debido a la geografía de la región, se cuentan con gran cantidad de actividades disponibles para tu entretenimiento. Te ofrecemos servicios de escalado, bicicleta, senderismo y más, todo depende de ti. </p>
		<hr />
	</header>


<div id="portfolio" class="portfolio-gutter">

	<ul class="nav nav-pills mix-filter mb-60">
		<li data-filter="all" class="filter active"><a href="#">Todas las imagenes</a></li>
	</ul>


	<div class="row mix-grid">

@foreach ($fotos as $foto)
@if (!empty($foto->Galeria))


		<div class="col-md-3 col-sm-3 mix development"><!-- item -->

			<div class="item-box">
				<figure>
					<span class="item-hover">
						<span class="overlay dark-5"></span>
						<span class="inner">

							<!-- lightbox -->
							<a class="ico-rounded lightbox" href="{{asset('storage/imagen/foto/'.$foto->imagen)}}" data-plugin-options='{"type":"image"}'>
								<span class="fa fa-plus fs-20"></span>
							</a>



						</span>
					</span>
					<img class="img-fluid" src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" width="600" height="399" alt="">
				</figure>
			</div>

		</div><!-- /item -->


@endif
@endforeach

</div>

</div>



</div>
</section>
<!-- /TITULO 1 -->

@endsection
