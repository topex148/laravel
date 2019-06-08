@extends('layouts.menuInicio')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Roles</h2>
    <p class="lead font-lato">Esta es la lista de los roles registrados en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  Roles

                  @can('roles.create')
                      <a href="{{route('roles.create')}}" class="pull-right btn btn-sm btn-primary"> Crear </a>
                  @endcan

                  @can('roles.invoice')
                      <a href="{{route('roles.invoice')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Reporte </a>
                  @endcan

                  @can('roles.invoice')
                      <a href="{{route('roles.invoiceDownload')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i>Descargar Reporte </a>
                  @endcan

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Role</th>
                                <th>Ver</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($roles as $role)
                              <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td width="10px">
                                    @can('roles.show')
                                    <a href="{{route('roles.show', $role->id)}}"
                                      class="btn btn-sm btn-primary">
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('roles.edit')
                                    <a href="{{route('roles.edit', $role->id)}}"
                                      class="btn btn-sm btn-primary">
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('roles.destroy')
                                    {!! Form::open(['route' => ['roles.destroy', $role->id],
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
                        {{ $roles->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
