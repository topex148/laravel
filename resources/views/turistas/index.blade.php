@extends('layouts.menuInicio')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Turistas</h2>
    <p class="lead font-lato">Esta es la lista de los Turistas registrados en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Turistas </strong></td>
                  </th>

                  @can('turistas.create')
                      <a href="{{route('turistas.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                  @endcan

                  @can('turistas.invoice')
                      <a href="{{route('turistas.invoice')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Reporte </a>
                  @endcan

                  @can('turistas.invoice')
                      <a href="{{route('turistas.invoiceDownload')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i>Descargar Reporte </a>
                  @endcan

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Pais de Procedencia</th>
                                <th>Estado de Procedencia</th>
                                <th>Ver</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($turistas as $turista)
                              <tr>
                                <td>{{$turista->id}}</td>
                                <td>{{$turista->Pais_P}}</td>
                                <td>{{$turista->Estado_P}}</td>
                                <td width="10px">
                                    @can('turistas.show')
                                    <a href="{{route('turistas.show', $turista->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('turistas.edit')
                                    <a href="{{route('turistas.edit', $turista->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('turistas.destroy')
                                    {!! Form::open(['route' => ['turistas.destroy', $turista->id],
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
                        {{ $turistas->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
