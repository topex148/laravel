@extends('layouts.app')

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

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              
                                <th width="10px">ID de Atractivo</th>
                                <th>Nombre del Atractivo</th>
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
@endsection
