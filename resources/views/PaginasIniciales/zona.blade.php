@extends('layouts.menu')

@section('content')
<!-- OWL SLIDER -->
<section id="slider">

  <div class="owl-carousel buttons-autohide controlls-over m-0" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": true, "transitionStyle":"fade"}'>
    <div>
      <img class="img-fluid" src="{{ asset("demo_files/images/panorama/1-min.jpg") }}" alt="">
    </div>
    <div>
      <img class="img-fluid" src="{{ asset("demo_files/images/panorama/2-min.jpg") }}" alt="">
    </div>
  </div>

</section>

<div class="box-light"><!-- .box-light OR .box-dark -->

  <div class="row">

<div class="col-md-12 col-sm-6">
        <!-- FLIP BOX -->
        <header>
        <div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center m-0">
          <div class="front">
            <div class="box1 rad-0">
              <div class="box-icon-title">
                <i class="fa fa-user"></i>
                <h2>{{$zona->nombre}} &ndash; Zona {{$zona->id}}</h2>
              </div>
              <p>Acá se mostrara toda la Información de la zona que selecciono.</p>
            </div>
          </div>

          <div class="back">
            <div class="box2 rad-0">
              <h4>Información de la Zona</h4>
              <hr />
              <p>{{$zona->Descripcion_Zona}}</p>
            </div>
          </div>
        </div>
        </header>
        <!-- /FLIP BOX -->


<!-- 4 -->
<section>

  <div class="container">

    <h4>Galeria de Imagenes</h4>
    <div class="masonry-gallery columns-4 clearfix lightbox " data-img-big="4" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>

      @foreach ($fotos as $foto)
      @if (($zona->id) == ($foto->id_Zona))
      <a class="image-hover" href="{{asset('storage/imagen/foto/'.$foto->imagen)}}">
        <img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" alt="..." >
      </a>
      @endif
      @endforeach

    </div>
  </div>
</section>
<!-- 4/ -->


<!-- FEATURES -->
<section id="features">
  <div class="container">

    <header class="text-center mb-60">
      <h2>Ahora es tu turno de elegir</h2>
      <h2>Entre todas las actividades ofrecidas en esta Zona</h2>
      <p class="lead font-lato">Debido a la geografía de la región, se cuentan con gran cantidad de actividades disponibles para tu entretenimiento. Te ofrecemos servicios de escalado, bicicleta, senderismo y más, todo depende de ti. </p>
      <hr />
    </header>

    <!-- FEATURED BOXES 3 -->
    <div class="row">
      <div class="col-md-3 col-xs-6">
        <div class="text-center">
          <i class="ico-light ico-lg ico-rounded ico-hover et-circle-compass"></i>
          <h4>Senderismo</h4>
          <p>Disfruta de todas las rutas que se encuentran en nuestra región.</p>
        </div>
      </div>
      <div class="col-md-3 col-xs-6">
        <div class="text-center">
          <i class="ico-light ico-lg ico-rounded ico-hover et-piechart"></i>
          <h4>Ciclismo de montaña</h4>
          <p>En nuestras increíbles montañas puedes disfrutar al máximo de las actividades extremas.</p>
        </div>
      </div>
      <div class="col-md-3 col-xs-6">
        <div class="text-center">
          <i class="ico-light ico-lg ico-rounded ico-hover et-strategy"></i>
          <h4>Canopy</h4>
          <p>Disfruta en las alturas todo lo que tenemos que ofrecer.</p>
        </div>
      </div>
      <div class="col-md-3 col-xs-6">
        <div class="text-center">
          <i class="ico-light ico-lg ico-rounded ico-hover et-streetsign"></i>
          <h4>Escalada</h4>
          <p>No le tengas miedo a los nuevos retos, nuestro equipo esta para guiarte. </p>
        </div>
      </div>
    </div>
    <!-- /FEATURED BOXES 3 -->

  </div>

  </div>
  </div>
  </div>

</section>
<!-- /FEATURES -->

@endsection
