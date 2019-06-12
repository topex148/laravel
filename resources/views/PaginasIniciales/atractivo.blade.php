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
                <i class="fa fa-user"></i>
                <h2>{{$atractivo->Nombre_Atractivo}} &ndash; Atractivo {{$atractivo->id}}</h2>
              </div>
              <p>Acá se mostrara toda la Información del atractivo que selecciono.</p>
            </div>
          </div>

          <div class="back">
            <div class="box2 rad-0">
              <h4>Información del Atractivo</h4>
              <hr />
              <p>{{$atractivo->Descripcion_Atractivo}}</p>
            </div>
          </div>
        </div>
        </header>
        <!-- /FLIP BOX -->

      </br>
      <div class="box-inner">
        <div class="text-center mb-60">
          <h2>Ubicacion</h2>
          <p class="lead font-lato">En esta parte podras conseguir informacion sobre la ubicacion del atractivo.</p>
        </div>


  <div class="container">
  <div class="row">

      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="card">
          <div class="card-block">
          <h4>Ubicacion:</h4>
          <p>{{$atractivo->Ubicacion}}</p>
        </div>
        </div>
      </div>

      @foreach ($zonas as $zona)
      @if (($atractivo->zona_id) == ($zona->id))
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="card">

          <div class="owl-carousel buttons-autohide controlls-over m-0" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": true, "transitionStyle":"fade"}'>

          @foreach ($fotos as $foto)
          @if (($foto->id_Zona) == ($zona->id))
          <a>
            <img  src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" alt="">
          </a>
          @endif
          @endforeach

          </div>

          <div class="card-block">
            <a href='{{asset('zonaLista/'.$atractivo->id.'/zona')}}' class="text-black fs-20 mb-20 block">Zona {{$atractivo->zona_id}}: {{$zona->nombre}} </a>
            <p class="fs-15 mb-20">{{$zona->Descripcion_Zona}}</p>
            <a href='{{asset('zonaLista/'.$atractivo->id.'/zona')}}' class="text-muted fs-15">VER ZONA</a>
          </div>



        </div>
      </div>
      @endif
      @endforeach

  </div>
  </div>

  </div>
</div>

<div class="container">

  <br></br>

  <h4>Galeria de Imagenes</h4>
  <div class="masonry-gallery columns-4 clearfix lightbox " data-img-big="4" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>

    @foreach ($fotos as $foto)
    @if (($atractivo->id) == ($foto->id_Atrac))
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
</div>
</div>
</br>
@endsection
