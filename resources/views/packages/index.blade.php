@extends('layouts.menuInicio')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Paquetes</h2>
    <p class="lead font-lato">Esta es la lista de los paquetes registrados en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Paquetes </strong></td>
                  </th>

                  @can('packages.create')
                      <a href="{{route('packages.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                  @endcan

                  @can('packages.invoice')
                      <a href="{{route('packages.invoice')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Reporte </a>
                  @endcan

                  @can('packages.invoice')
                      <a href="{{route('packages.invoiceDownload')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i>Descargar Reporte </a>
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
                              @foreach($packages as $package)
                              <tr>
                                <td>{{$package->id}}</td>
                                <td>{{$package->Fecha_Inicio}}</td>
                                <td>{{$package->Fecha_Final}}</td>
                                <td width="10px">
                                    @can('packages.show')
                                    <a href="{{route('packages.show', $package->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('packages.edit')
                                    <a href="{{route('packages.edit', $package->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('packages.destroy')
                                    {!! Form::open(['route' => ['packages.destroy', $package->id],
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
                        {{ $packages->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
