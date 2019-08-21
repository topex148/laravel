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

  </br>

    <div class="container">
      <div class="text-center mb-60">
        <h2>Lista de Atractivos</h2>
        <p class="lead font-lato">Esta son los diversos atractivos que puedes encontrar en la region.</p>
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
			@foreach ($atractivos as $notes)

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="card">

          <div class="owl-carousel buttons-autohide controlls-over m-0" data-plugin-options='{"singleItem": true, "autoPlay": true, "navigation": true, "pagination": true, "transitionStyle":"fade"}'>
						@foreach ($fotos as $foto)
						@if (($notes->id) == ($foto->id_Atrac))

								<a>
									<img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" >
								</a>

						@endif
						@endforeach
						</div>

            <div class="card-block">
              <a id="atractivo" href='{{asset('atractivoLista/'.$notes->id.'/atractivo')}}' class="text-black fs-20 mb-20 block">Atractivo {{$notes->id}}: {{$notes->Nombre_Atractivo}}</a>
              <p class="fs-15 mb-20">{{$notes->Descripcion_Atractivo}}</p>
							@foreach ($zonas as $zona)
							@if (($notes->zona_id) == ($zona->id))
							<h4>Pertenece a la Zona {{$notes->zona_id}}: {{$zona->nombre}}</h4>
							@endif
							@endforeach
              <a  href='{{asset('atractivoLista/'.$notes->id.'/atractivo')}}' class="text-muted fs-15">VER ATRACTIVO</a>
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
