@extends('layouts.menuInicio')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Publicidad</h2>
    <p class="lead font-lato">Esta es la lista de los banners publicados en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                  <tr width="10px">
                    <td><strong>  Banners </strong></td>
                  </th>

                  @can('publicidad.create')
                      <a href="{{route('publicidad.create')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Crear </a>
                  @endcan

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Banner</th>
                                <th>Fecha Final</th>
                                <th>RIF Prestador</th>
                                <th>Ver</th>
                                <th>Editar</th>
                                <th>Suspender</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($publicidade as $publicidad)
                              <tr>
                                <td>{{$publicidad->id}}</td>
                                <td>
                                  <img src="{{asset('storage/imagen/publicidad/'.$publicidad->imagen)}}" style="width:75px; height:75px; float:left; border-radius:50%; margin-right:25px;">
                                </td>
                                <td>{{$publicidad->Fecha_Final}}</td>
                                <td>{{$publicidad->RIF_Prest}}</td>
                                <td width="10px">
                                    @can('publicidad.show')
                                    <a href="{{route('publicidad.show', $publicidad->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('publicidad.edit')
                                    <a href="{{route('publicidad.edit', $publicidad->id)}}"
                                      class="btn btn-primary btn-sm"><i class="fa fa-check"></i>
                                        Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('publicidad.destroy')
                                    {!! Form::open(['route' => ['publicidad.destroy', $publicidad->id],
                                    'method' => 'DELETE'])!!}
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-check"></i>
                                          Suspender
                                        </button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>


                        {{ $publicidade->render()}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- BUTTON CALLOUT -->
<a href="{{route('publicidad.suspender')}}" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
<span class="font-lato fs-30">
Si quiere revisar las publicidades que han sido suspendidas!
<strong>Presionar aqui &raquo;</strong>
</span>
</a>
@endsection
