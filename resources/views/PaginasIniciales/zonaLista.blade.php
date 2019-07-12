@extends('layouts.menu')

@section('content')

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

  </br>

    <div class="container">
      <div class="text-center mb-60">
        <h2>Lista de Zonas</h2>
        <p class="lead font-lato">Esta son las diversas zonas que puedes encontrar en la region.</p>
      </div>
    </div>
    <hr/>

    <!-- /OWL SLIDER -->
    <div class="row justify-content-center">
    <div class="col-md-10">
    <div class="box-light"><!-- .box-light OR .box-dark -->
      <div class="box-inner">



    <!-- -->
    <div class="row category-grid">
			@foreach ($zonas as $notes)

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="card">

          <div class="owl-carousel buttons-autohide controlls-over m-0" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": true, "transitionStyle":"fade"}'>
						@foreach ($fotos as $foto)
						@if (($notes->id) == ($foto->id_Zona))

								<a>
									<img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" >
								</a>

						@endif
						@endforeach
						</div>

            <div class="card-block">
              <a href='{{asset('zonaLista/'.$notes->id.'/zona')}}' class="text-black fs-20 mb-20 block">Zona {{$notes->id}}: {{$notes->nombre}}</a>
              <p class="fs-15 mb-20">{{$notes->Descripcion_Zona}}</p>
              <a dusk="login-button" href='{{asset('zonaLista/'.$notes->id.'/zona')}}' class="text-muted fs-15">VER ZONA</a>      
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

@endsection
