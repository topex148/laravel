@extends('layouts.app')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Prestadores</h2>
    <p class="lead font-lato">Esta es la lista de los Prestadores registrados en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Prestadores </strong></td>
                  </th>

                  @can('prestadores.create')
                      <a href="{{route('prestadores.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                  @endcan

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">RIF</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($prestadores as $prestadore)
                              <tr>
                                <td>{{$prestadore->RIF}}</td>
                                <td>{{$prestadore->Nombre}}</td>
                                <td>{{$prestadore->Telefono}}</td>
                                <td width="10px">
                                    @can('prestadores.show')
                                    <a href="{{route('prestadores.show', $prestadore->RIF)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('prestadores.edit')
                                    <a href="{{route('prestadores.edit', $prestadore->RIF)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('prestadores.destroy')
                                    {!! Form::open(['route' => ['prestadores.destroy', $prestadore->RIF],
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
                        {{ $prestadores->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
