@extends('layouts.app')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Contactos</h2>
    <p class="lead font-lato">Esta es la lista de los contactos registrados en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Contactos </strong></td>
                  </th>

                  @can('contactos.create')
                      <a href="{{route('contactos.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                  @endcan

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Asunto</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($contactos as $contacto)
                              <tr>
                                <td>{{$contacto->id}}</td>
                                <td>{{$contacto->nombre}}</td>
                                <td>{{$contacto->Asunto}}</td>
                                <td width="10px">
                                    @can('contactos.show')
                                    <a href="{{route('contactos.show', $contacto->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('contactos.edit')
                                    <a href="{{route('contactos.edit', $contacto->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('contactos.destroy')
                                    {!! Form::open(['route' => ['contactos.destroy', $contacto->id],
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
                        {{ $contactos->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
