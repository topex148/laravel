@extends('layouts.menuInicio')

@section('content')

<!-- CONTACT -->

      <div class="container">
        <header class="text-center mb-60">
          <h2>Lista de Publicidades Suspendidas</h2>
          <p class="lead font-lato">Esta es la lista de las publicidades suspendidas en el sistema.</p>
          <hr />
        </header>

        <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">

      <div class="panel-body">
      <table class="table table-striped table-hover">
        <thead>
          <tr>

            <th width="10px">ID</th>
            <th>Banner</th>
            <th>Fecha Final</th>
            <th>Restaurar</th>
            <th>Borrar</th>
            <th colspan="3">&nbsp;</th>


          </tr>
        </thead>
        <tbody>
          @foreach ($publicidades as $suspe)
          <tr>
            <td>
              <a>{{$suspe->id}} </a>
            </td>
            <td>
              <img src="{{asset('storage/imagen/publicidad/'.$suspe->imagen)}}" style="width:75px; height:75px; float:left; border-radius:50%; margin-right:25px;">
            </td>

            <td>
              <a>{{$suspe->Fecha_Final}} </a>
            </td>

            <td>
              <a href="suspender/{{$suspe->id}}/{id}/Restaurar" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Restaurar </a>
            </td>
            <td>
              <a href="suspender/{{$suspe->id}}/{id}/Borrar" class="btn btn-danger btn-sm"><i class="fa fa-check"></i> Eliminar </a>
            </td>

            <tr>
              @endforeach
            </tbody>
          </table>
          </div>

          </div>
          </div>
          </div>

        </div>


			<!-- /CONTACT -->

      <!-- BUTTON CALLOUT -->
      <a href="/LaTesis/public/publicidad" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">

          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
