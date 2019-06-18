@extends('layouts.menuInicio')

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
                  </tr>


                  @can('prestadores.invoice')
                      <a href="{{route('prestadores.invoice')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Reporte </a>
                  @endcan

                  @can('prestadores.invoice')
                      <a href="{{route('prestadores.invoiceDownload')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Descargar Reporte </a>
                  @endcan


                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">RIF</th>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Ver</th>
                                <th>Suspender</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($prestadores as $prestadore)
                              <tr>
                                <td>{{$prestadore->RIF}}</td>
                                <td>
                                  <img src="{{asset('storage/imagen/prestador/'.$prestadore->imagen)}}" style="width:75px; height:75px; float:left; border-radius:50%; margin-right:25px;">
                                </td>
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
                                    @can('prestadores.destroy')
                                    {!! Form::open(['route' => ['prestadores.destroy', $prestadore->RIF],
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

                </div>
            </div>
        </div>
    </div>
</div>

<!-- BUTTON CALLOUT -->
<a href="{{route('prestadores.suspender')}}" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
<span class="font-lato fs-30">
Si quiere revisar los prestadores que han sido suspendidos!
<strong>Presionar aqui &raquo;</strong>
</span>
</a>
@endsection
