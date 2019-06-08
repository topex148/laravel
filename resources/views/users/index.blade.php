@extends('layouts.menuInicio')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Usuarios</h2>
    <p class="lead font-lato">Esta es la lista de los usuarios registrados en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <tr width="10px">
                    <td><strong>  Usuarios </strong></td>
                  </th>

                  @can('users.invoice')
                      <a href="{{route('users.invoice')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Reporte </a>
                  @endcan

                  @can('users.invoice')
                      <a href="{{route('users.invoiceDownload')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i>Descargar Reporte </a>
                  @endcan

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Ver</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($users as $user)
                              <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td width="10px">
                                    @can('users.show')
                                    <a href="{{route('users.show', $user->id)}}"
                                      class="btn btn-sm btn-primary">
                                        Ver
                                    </a>
                                    @endcan
                                </td>

                                <td width="10px">
                                    @can('users.edit')
                                    <a href="{{route('users.edit', $user->id)}}"
                                      class="btn btn-sm btn-primary">
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('users.destroy')
                                    {!! Form::open(['route' => ['users.destroy', $user->id],
                                    'method' => 'DELETE'])!!}
                                        <button class="btn btn-sm btn-danger">
                                          Eliminar
                                        </button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                        {{ $users->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
