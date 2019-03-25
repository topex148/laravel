@extends('layouts.app')

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
@endsection
