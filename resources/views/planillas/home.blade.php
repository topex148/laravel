@extends('layouts.menuInicio')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Contactos Registro</h2>
    <p class="lead font-lato">Esta es la lista de los Contactos que han enviado pdf de registro.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Contactos Registros </strong></td>
                  </tr>

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Ver</th>
                                <th>Descargar</th>
                                <th>Eliminar</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($contactos as $contacto)
                              <tr>
                                <td>{{$contacto->id}}</td>
                                <td>{{$contacto->usuarioNombre}}</td>
                                <td>{{$contacto->usuarioCorreo}}</td>
                                <td width="10px">
                                    @can('prestadores.show')
                                    <a href="{{route('prestadores.ver', $contacto->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('prestadores.edit')

                                    <a href="{{route('prestadores.descargar', $contacto->id)}}"   class="btn btn-primary btn-sm">
                                      <i class="fa fa-check"></i> Descargar </a>

                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('prestadores.destroy')
                                    {!! Form::open(['route' => ['prestadores.eliminar', $contacto->id],
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

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
