@extends('layouts.menuInicio')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Itinerarios</h2>
    <p class="lead font-lato">Esta es la lista de los Itinerarios registrados en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Itinerarios </strong></td>
                  </th>

                  @can('itinerarios.create')
                      <a href="{{route('itinerarios.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                  @endcan

                  @can('itinerarios.invoice')
                      <a href="{{route('itinerarios.invoice')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Reporte </a>
                  @endcan

                  @can('itinerarios.invoice')
                      <a href="{{route('itinerarios.invoiceDownload')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i>Descargar Reporte </a>
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
                              <tr>
                                <td>{{$itinerario->id}}</td>
                                <td>{{$itinerario->Fecha_Inicio}}</td>
                                <td>{{$itinerario->Fecha_Final}}</td>
                                <td width="10px">
                                    @can('itinerarios.show')
                                    <a href="{{route('itinerarios.show', $itinerario->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('itinerarios.edit')
                                    <a href="{{route('itinerarios.edit', $itinerario->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('itinerarios.destroy')
                                    {!! Form::open(['route' => ['itinerarios.destroy', $itinerario->id],
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
                        {{ $itinerarios->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
