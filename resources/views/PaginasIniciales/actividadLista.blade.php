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
            <div class="text-center mb-60">
						<h2>Ahora es tu turno de elegir</h2>
						<h2>Entre todas las actividades ofrecidas en Mérida</h2>
						<p class="lead font-lato">Debido a la geografía de la región, se cuentan con gran cantidad de actividades disponibles para tu entretenimiento. Te ofrecemos servicios de escalado, bicicleta, senderismo y más, todo depende de ti. </p>
            </div>
          </div>
          <hr/>

          <div class="row justify-content-center">
          <div class="col-md-10">
          <div class="box-light"><!-- .box-light OR .box-dark -->
          <div class="box-inner">

          <!-- FEATURED BOXES 3 -->
          <div class="row">

            @foreach ($actividades as $actividade)
            <div class="col-md-4 ">
              <div class="text-center">
                  <div class="owl-carousel text-center owl-testimonial m-0" data-plugin-options='{"singleItem": true, "autoPlay": 4000, "navigation": false, "pagination": true, "transitionStyle":"fade"}'>
                @foreach ($fotos as $foto)
                @if (($foto->id_Activi) == ($actividade->id))
                <figure>
                    <img  class="img rounded" src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" style="width:75px; height:75px;">
                </figure>
                @endif
                @endforeach
                </div>
                <h4>{{$actividade->titulo}}</h4>
                <p>{{$actividade->descripcion}}</p>
               <!-- <p>{{$actividade->descripcion}}</p>-->
              </div>
            </div>
            @endforeach


          </div>

      </div>
      </div>
      </div>
      </div>

			<!-- /FEATURES -->
    </br>
  </div>
@endsection
