@extends('layouts.app')

@section('content')
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
                      <a href="{{route('fotos.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
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
                              @foreach($fotos as $foto)
                              <tr>
                                <td>{{$foto->id}}</td>
                                <td>{{$foto->Titulo}}</td>
                                <td>{{$foto->descripcion}}</td>
                                <td width="10px">
                                    @can('fotos.show')
                                    <a href="{{route('fotos.show', $foto->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('fotos.edit')
                                    <a href="{{route('fotos.edit', $foto->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('fotos.destroy')
                                    {!! Form::open(['route' => ['fotos.destroy', $foto->id],
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
                        {{ $fotos->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
