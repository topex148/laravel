@extends('layouts.menu')

@section('content')
<div class="container">
<!-- OWL SLIDER -->
    <section id="slider">

      <div class="owl-carousel buttons-autohide controlls-over m-0" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": true, "transitionStyle":"fade"}'>
        @foreach ($publicidades as $publicidad)
        <div>
          <a href="{{asset('servicioLista/'.$publicidad->RIF_Prest.'/prestador')}}">
          <img class="img-fluid" src="{{asset('storage/imagen/publicidad/'.$publicidad->imagen)}}" style="width:1800px; height:450px;">
          </a>
        </div>
        @endforeach

    </section>
    <!-- /OWL SLIDER -->
      </br>

				<div class="container">

					<header class="text-center mb-60">
						<h2>Ahora es tu turno de elegir</h2>
						<h2>Entre todas los servicios ofrecidos en Mérida</h2>
						<p class="lead font-lato">Debido a la geografía de la región, se cuentan con gran cantidad de actividades disponibles para tu entretenimiento. Te ofrecemos servicios de escalado, bicicleta, senderismo y más, todo depende de ti. </p>
					</header>

				</div>
        <hr/>

        <!-- /OWL SLIDER -->
        <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="box-light"><!-- .box-light OR .box-dark -->
        <div class="box-inner">

          <div class="container">

  					<div class="row">
              @foreach ($prestadores as $notes)
  						<div class="col-md-4">
  							<div class="testimonial testimonial-bordered p-15">
  								<figure class="float-left">
  									<img class="rounded" src="{{asset('storage/imagen/prestador/'.$notes->imagen)}}" alt="" />
  								</figure>
  								<div class="testimonial-content">
  									<p>{{$notes->DescripcionPrestador}}</p>
  									<cite>
  										<a href="servicioLista/{{$notes->RIF}}/prestador">{{$notes->Nombre}}</a>
  										<span>{{$notes->Telefono}}</span>
  									</cite>
  								</div>
  							</div>
  						</div>
              @endforeach
  					</div>

  				</div>

          </div>
          </div>
          </div>
          </div>

        </br>
</div>
@endsection
