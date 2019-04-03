@extends('layouts.menuInicio')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Actividades</h2>
    <p class="lead font-lato">Esta es la lista de las actividades registradas en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Actividades </strong></td>
                  </th>

                  @can('actividades.create')
                      <a href="{{route('actividades.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                  @endcan

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Titulo</th>
                                <th>Descripcion</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($actividades as $actividade)
                              <tr>
                                <td>{{$actividade->id}}</td>
                                <td>{{$actividade->titulo}}</td>
                                <td>{{$actividade->descripcion}}</td>
                                <td width="10px">
                                    @can('actividades.show')
                                    <a href="{{route('actividades.show', $actividade->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('actividades.edit')
                                    <a href="{{route('actividades.edit', $actividade->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('actividades.destroy')
                                    {!! Form::open(['route' => ['actividades.destroy', $actividade->id],
                                    'method' => 'DELETE'])!!}
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-check"></i>
                                          Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                        {{ $actividades->render()}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Fotos</h2>
    <p class="lead font-lato">Esta es la lista de los fotos registradas en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Fotos </strong></td>
                  </th>

                  @can('fotos.create')
                      <a href="{{route('fotosActividades.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
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
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($fotos as $foto)
                              @if (($foto->id_Activi) != (NULL))
                              <tr>
                                <td>{{$foto->id}}</td>
                                <td>
                                  <img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" style="width:75px; height:75px; float:left; border-radius:50%; margin-right:25px;">
                                </td>
                                <td>{{$foto->title}}</td>
                                <td>{{$foto->descripcion}}</td>
                                <td width="10px">
                                    @can('fotos.show')
                                    <a href="{{route('fotosActividades.show', $foto->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('fotos.edit')
                                    <a href="{{route('fotosActividades.edit', $foto->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('fotos.destroy')
                                    {!! Form::open(['route' => ['fotosActividades.destroy', $foto->id],
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
@endsection
