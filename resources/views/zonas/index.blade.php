@extends('layouts.app')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Zonas</h2>
    <p class="lead font-lato">Esta es la lista de los Zonas registrados en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Zonas </strong></td>
                  </th>

                  @can('zonas.create')
                      <a href="{{route('zonas.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                  @endcan

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Descripcion de la Zona</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($zonas as $zona)
                              <tr>
                                <td>{{$zona->id}}</td>
                                <td>{{$zona->nombre}}</td>
                                <td>{{$zona->Descripcion_Zona}}</td>
                                <td width="10px">
                                    @can('zonas.show')
                                    <a href="{{route('zonas.show', $zona->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('zonas.edit')
                                    <a href="{{route('zonas.edit', $zona->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('zonas.destroy')
                                    {!! Form::open(['route' => ['zonas.destroy', $zona->id],
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
                        {{ $zonas->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
