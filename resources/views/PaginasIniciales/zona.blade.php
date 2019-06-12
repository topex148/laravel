@extends('layouts.menu')

@section('content')
</br>
<div class="row justify-content-center">
<div class="col-md-10">
<div class="box-light"><!-- .box-light OR .box-dark -->
<div class="row">

<div class="col-md-12 col-sm-6">
        <!-- FLIP BOX -->
        <header>
        <div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center m-0">
          <div class="front">
            <div class="box1 rad-0">
              <div class="box-icon-title">
                <i class="ico-dark ico-rounded ico-hover et-bike"></i>
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

      </br>
      <div class="box-inner">
        <div class="text-center mb-60">
          <h2>Lista de Atractivos</h2>
          <p class="lead font-lato">Esta son los diversos atractivos que puedes encontrar en esta zona.</p>
        </div>


      <div class="row category-grid">
        @foreach($atractivos as $atractivo)
        @if (($zona->id) == ($atractivo->zona_id))
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="card">

            <div class="owl-carousel buttons-autohide controlls-over m-0" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": true, "transitionStyle":"fade"}'>

            @foreach ($fotos as $foto)
            @if (($foto->id_Atrac) == ($atractivo->id))
            <a>
              <img  src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" alt="">
            </a>
            @endif
            @endforeach

            </div>

            <div class="card-block">
              <a href='{{asset('atractivoLista/'.$atractivo->id.'/atractivo')}}' class="text-black fs-20 mb-20 block">{{$atractivo->Nombre_Atractivo}}</a>
              <p class="fs-15 mb-20">{{$atractivo->Descripcion_Atractivo}}</p>
              <a href='{{asset('atractivoLista/'.$atractivo->id.'/atractivo')}}' class="text-muted fs-15">VER ATRACTIVO</a>
            </div>

          </div>
        </div>
        @endif
        @endforeach
        </div>
        </div>
    </div>



  <div class="container">
  </br>
    <h4>Galeria de Imagenes</h4>
    <div class="masonry-gallery columns-3 clearfix lightbox " data-img-big="4" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>

      @foreach ($fotos as $foto)
      @if (($zona->id) == ($foto->id_Zona))
      <a class="image-hover" href="{{asset('storage/imagen/foto/'.$foto->imagen)}}">
        <img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" alt="..." >
      </a>
      @endif
      @endforeach

    </div>
  </div>

</div>
</div>
</div>
</div>
</br>
@endsection
