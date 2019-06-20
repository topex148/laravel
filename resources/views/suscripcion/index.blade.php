@extends('layouts.menuInicio')

@section('content')
<div class="container">
  <header class="text-center mb-60">
    <h2>Lista de Suscriptores</h2>
    <p class="lead font-lato">Esta es la lista de los suscriptores registrados en el sistema.</p>
  </header>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <tr width="10px">
                    <td><strong>  Suscriptores </strong></td>
                  </th>

                </div>

                <div class="panel-body">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre Usuario</th>
                                <th>ID Usuario</th>
                                <th>Plan de Suscripcion</th>
                                <th>Ver</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach($suscripciones as $suscripcione)
                              <tr>
                                @foreach($users as $user)
                                @if(($user->id) == ($suscripcione->user_id))
                                <td>{{$suscripcione->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->id}}</td>
                                <td>{{$suscripcione->stripe_plan}}</td>
                                <td width="10px">
                                    @can('users.show')
                                    <a href="{{route('suscripcion.show', $user->id)}}"
                                      class="btn btn-sm btn-primary">
                                        Ver
                                    </a>
                                    @endcan
                                </td>
                                @endif
                                @endforeach
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
