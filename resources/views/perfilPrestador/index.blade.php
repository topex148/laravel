@extends('layouts.menuInicio')

@section('content')

@foreach ($prestadores as $prestadore)
@if (($prestadore->userId) == (\Auth::user()->id))
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
    <li class="list-group-item active"><a href='{{asset('perfilPrestador')}}'><i class="fa fa-eye"></i> PERFIL</a></li>
    <a href="{{route('perfil.edit', $prestadore->RIF)}}"
      class="btn btn-sm btn-primary">
        Editar
    </a>
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

<section>
  <div class="container">
    <header class="text-center mb-60">
      <h2>Lista de Fotos</h2>
      <p class="lead font-lato">Esta es la lista de  fotos registradas por el prestador.</p>
    </header>
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">

                    <tr width="10px">
                      <td><strong>  Fotos </strong></td>
                    </th>

                    @can('imagen.create')
                        <a href="{{route('imagen.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                    @endcan

                  </div>

                  <div class="panel-body">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                  <th width="10px">ID</th>
                                  <th>Foto</th>
                                  <th>Titulo</th>
                                  <th>Descripcion</th>
                                  <th>Ver</th>
                                  <th>Editar</th>
                                  <th>Eliminar</th>
                                  <th colspan="3">&nbsp;</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($fotos as $foto)
                                @if (($foto->RIF_Prest) == ($prestadore->RIF))
                                <tr>
                                  <td>{{$foto->id}}</td>
                                  <td>
                                    <img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" style="width:75px; height:75px; float:left; border-radius:50%; margin-right:25px;">
                                  </td>
                                  <td>{{$foto->title}}</td>
                                  <td>{{$foto->descripcion}}</td>
                                  <td width="10px">
                                      @can('imagen.show')
                                      <a href="{{route('imagen.show', $foto->id)}}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                          Ver
                                      </a>
                                      @endcan
                                  </td>
                                  <td width="10px">
                                      @can('imagen.edit')
                                      <a href="{{route('imagen.edit', $foto->id)}}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                          Editar
                                      </a>
                                      @endcan
                                  </td>
                                  <td width="10px">
                                      @can('imagen.destroy')
                                      {!! Form::open(['route' => ['imagen.destroy', $foto->id],
                                      'method' => 'DELETE'])!!}
                                          <button class="btn btn-danger btn-sm"><i class="fa fa-check"></i>
                                            Eliminar
                                          </button>
                                      {!! Form::close() !!}
                                      @endcan
                                  </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                          </table>

                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<section>
  <div class="container">
    <header class="text-center mb-60">
      <h2>Lista de Itinerarios</h2>
      <p class="lead font-lato">Esta es la lista de los Itinerarios registrados por el prestador.</p>
    </header>
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">

                    <tr width="10px">
                      <td><strong>  Itinerarios </strong></td>
                    </th>

                    @can('itine.create')
                        <a href="{{route('itine.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                    @endcan

                  </div>

                  <div class="panel-body">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                  <th width="10px">ID</th>
                                  <th>Fecha Inicio</th>
                                  <th>Fecha Final</th>
                                  <th>Ver</th>
                                  <th>Editar</th>
                                  <th>Eliminar</th>
                                  <th colspan="3">&nbsp;</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($itinerarios as $itinerario)
                                @if (($itinerario->RIF_4) == ($prestadore->RIF))
                                <tr>
                                  <td>{{$itinerario->id}}</td>
                                  <td>{{$itinerario->Fecha_Inicio}}</td>
                                  <td>{{$itinerario->Fecha_Final}}</td>
                                  <td width="10px">
                                      @can('itine.show')
                                      <a href="{{route('itine.show', $itinerario->id)}}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                          Ver
                                      </a>
                                      @endcan
                                  </td>
                                  <td width="10px">
                                      @can('itine.edit')
                                      <a href="{{route('itine.edit', $itinerario->id)}}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                          Editar
                                      </a>
                                      @endcan
                                  </td>
                                  <td width="10px">
                                      @can('itine.destroy')
                                      {!! Form::open(['route' => ['itine.destroy', $itinerario->id],
                                      'method' => 'DELETE'])!!}
                                          <button class="btn btn-danger btn-sm"><i class="fa fa-check"></i>
                                            Eliminar
                                          </button>
                                      {!! Form::close() !!}
                                      @endcan
                                  </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                          </table>

                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<section>
  <div class="container">
    <header class="text-center mb-60">
      <h2>Lista de Contactos</h2>
      <p class="lead font-lato">Esta es con los mensajes dirigidos a ti de parte de los turistas.</p>
    </header>
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">

                    <tr width="10px">
                      <td><strong>  Contactos </strong></td>
                    </th>


                  </div>

                  <div class="panel-body">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                  <th width="10px">ID</th>
                                  <th>Nombre</th>
                                  <th>Correo</th>
                                  <th>Ver</th>
                                  <th>Eliminar</th>
                                  <th colspan="3">&nbsp;</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($contactos as $contacto)
                                @if (($contacto->RIF) == ($prestadore->RIF))
                                <tr>
                                  <td>{{$contacto->id}}</td>
                                  <td>{{$contacto->nombre}}</td>
                                  <td>{{$contacto->correo}}</td>
                                  <td width="10px">
                                      @can('itine.show')
                                      <a href="{{route('itine.show', $contacto->id)}}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                          Ver
                                      </a>
                                      @endcan
                                  </td>
                                  <td width="10px">
                                      @can('itine.destroy')
                                      {!! Form::open(['route' => ['itine.destroy', $contacto->id],
                                      'method' => 'DELETE'])!!}
                                          <button class="btn btn-danger btn-sm"><i class="fa fa-check"></i>
                                            Eliminar
                                          </button>
                                      {!! Form::close() !!}
                                      @endcan
                                  </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                          </table>

                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endif

@endforeach

@endsection
