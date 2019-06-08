@extends('layouts.menu')

@section('content')
<!-- -->
<section>
  <div class="container">
    <div class="row">


      <!-- LEFT -->
<div class="col-lg-3 col-md-3 col-sm-4">

  <div class="thumbnail text-center">
    <img class="img-fluid" src="{{asset('storage/imagen/prestador/'.$prestadore->imagen)}}" alt="" />
    <h2 class="fs-18 mt-10 mb-0">{{$prestadore->Nombre}}</h2>
    <h3 class="fs-11 mt-0 mb-10 text-muted">PRESTADOR DE SERVICIO</h3>
  </div>


  <!-- SIDE NAV -->
  <ul class="side-nav list-group mb-60" id="sidebar-nav">
    <li class="list-group-item active"><a href='{{asset('servicioLista/'.$prestadore->RIF.'/prestador')}}'><i class="fa fa-eye"></i> Perfil</a></li>
    @if(Auth::guest())
    <li class="list-group-item active"><a href='#'><i class="fa fa-comments-o"></i> Registrate para contactarme</a></li>
    @endif

    @if(Auth::check())
    <li class="list-group-item active"><a href='{{asset('servicioLista/'.$prestadore->RIF.'/prestador/contactar')}}'><i class="fa fa-comments-o"></i> Contactar</a></li>
    @endif
  </ul>
  <!-- /SIDE NAV -->


  <!-- info -->
  <div class="box-light mb-30"><!-- .box-light OR .box-light -->

    <!-- /info -->

    <div class="text-muted">
      <h2 class="fs-18 text-muted mb-6"><b>Redes Sociales</b> </h2>
      <!-- <p>Estas son las redes sociales donde puedes contactar conmigo.</p>-->

      <ul class="list-unstyled m-0">
        <li class="mb-10"><i class="fa fa-instagram fw-20 hidden-xs-down hidden-sm"></i> <a href="{{$prestadore->Instagram}}">{{$prestadore->Instagram}}</a></li>
        <li class="mb-10"><i class="fa fa-facebook fw-20 hidden-xs-down hidden-sm"></i> <a href="{{$prestadore->Facebook}}">{{$prestadore->Facebook}}</a></li>
        <li class="mb-10"><i class="fa fa-twitter fw-20 hidden-xs-down hidden-sm"></i> <a href="{{$prestadore->Twitter}}">{{$prestadore->Twitter}}</a></li>
      </ul>
    </div>

  </div>

</div>

<!-- RIGHT -->
<div class="col-lg-9 col-md-9 col-sm-8">

  <!-- FLIP BOX -->
  <div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center m-0">
    <div class="front">
      <div class="box1 rad-0">
        <div class="box-icon-title">
          <i class="fa fa-user"></i>
          <h2>{{$prestadore->Nombre}}  &ndash; Perfil</h2>
        </div>
        <p>En esta paginá conseguira toda la información relevante sobre el prestador de servicio y el servicio prestado por el mismo.</p>
      </div>
    </div>

    <div class="back">
      <div class="box2 rad-0">
        <h4>¿QUIÉN SOY?</h4>
        <hr />
        <p>{{$prestadore->DescripcionPrestador}}</p>
      </div>
    </div>
  </div>
  <!-- /FLIP BOX -->


  <div class="box-light"><!-- .box-light OR .box-dark -->

    <div class="row">

      <!-- POPULAR POSTS -->
      <div class="col-md-6 col-sm-6">

        <div class="box-inner">
          <h3>
            DESCRIPCION DEL SERVICIO
          </h3>
          <div class="h-250 slimscroll" data-always-visible="true" data-size="5px" data-position="right" data-opacity="0.4" disable-body-scroll="true">

          <p>{{$prestadore->DescripcionServicio}}</p>


          </div>
        </div>

      </div>
      <!-- /POPULAR POSTS -->

      <!-- FRIENDS -->
      <div class="col-md-6 col-sm-6">

        <div class="box-inner">
          <h3>
            INFORMACION DE ACTIVIDADES
          </h3>
          <div class="h-250 slimscroll" data-always-visible="true" data-size="5px" data-position="right" data-opacity="0.4" disable-body-scroll="true">

            <div class="clearfix mb-10">
                <p>{{$prestadore->DescripcionActividad}}</p>
            </div>

          </div>
        </div>

      </div>
      <!-- /FRIENDS -->

    </div>

  </div>


</div>



    </div>
  </div>
</section>
<!-- / -->


  <!-- POPULAR POSTS -->
<div class="col-md-12 col-sm-6">

    <div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center m-0">
        <div class="box-inner">
            <h4>
              IMAGENES
            </h4>

            <div class="container">


              <div class="masonry-gallery columns-5 clearfix lightbox" data-img-big="1" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>


                  @foreach ($fotos as $foto)
                  @if (($foto->RIF_Prest) == ($prestadore->RIF))
                  <a class="image-hover" href="{{asset('storage/imagen/foto/'.$foto->imagen)}}">
                    <img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" />
                  </a>
                  @endif
                  @endforeach

                </div>

            </div>
        </div>

    </div>

  </div>

@endsection
