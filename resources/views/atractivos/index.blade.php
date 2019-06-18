@extends('layouts.menuInicio')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Atractivos</h2>
    <p class="lead font-lato">Esta es la lista de los atractivos registrados en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Atractivos </strong></td>
                  </th>

                  @can('atractivos.create')
                      <a href="{{route('atractivos.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                  @endcan

                  @can('atractivos.invoice')
                      <a href="{{route('atractivos.invoice')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Reporte </a>
                  @endcan

                  @can('atractivos.invoice')
                      <a href="{{route('atractivos.invoiceDownload')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i>Descargar Reporte </a>
                  @endcan

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>

                                <th width="10px">ID de Atractivo</th>
                                <th>Nombre del Atractivo</th>
                                <th>Ver</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($atractivos as $atractivo)
                              <tr>
                                <td>{{$atractivo->id}}</td>
                                <td>{{$atractivo->Nombre_Atractivo}}</td>
                                <td width="10px">
                                    @can('atractivos.show')
                                    <a href="{{route('atractivos.show', $atractivo->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('atractivos.edit')
                                    <a href="{{route('atractivos.edit', $atractivo->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('atractivos.destroy')
                                    {!! Form::open(['route' => ['atractivos.destroy', $atractivo->id],
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
                        {{ $atractivos->render()}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Fotos</h2>
    <p class="lead font-lato">Esta es la lista de los fotos registradas en el sistema perteneciente a los atractivos.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Fotos </strong></td>
                  </th>

                  @can('fotos.create')
                      <a href="{{route('fotosAtractivos.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                  @endcan

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Foto</th>
                                <th>Atractivo</th>
                                <th>Titulo</th>
                                <th>Descripcion</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($fotos as $foto)
                              @if (($foto->id_Atrac) != (NULL))
                              <tr>
                                <td>{{$foto->id}}</td>
                                <td>
                                  <img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" style="width:75px; height:75px; float:left; border-radius:50%; margin-right:25px;">
                                </td>
                                <td>{{$foto->id_Atrac}}</td>
                                <td>{{$foto->title}}</td>
                                <td>{{$foto->descripcion}}</td>
                                <td width="10px">
                                    @can('fotos.show')
                                    <a href="{{route('fotosAtractivos.show', $foto->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('fotos.edit')
                                    <a href="{{route('fotosAtractivos.edit', $foto->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('fotos.destroy')
                                    {!! Form::open(['route' => ['fotosAtractivos.destroy', $foto->id],
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
