@extends('layouts.menuInicio')

@section('content')

<!-- -->
<section>
  <div class="container">

    <div class="row">

      <div class="col-lg-5 col-md-5 col-sm-5">

        <img class="img-fluid" src="{{ asset("demo_files/images/girl_looking-min.jpg") }}" alt="">

      </div>

      <div class="col-lg-7 col-md-7 col-sm-7">
        <h2> Exito!</h2>

        <h3>Usted ha realizado la subscripcion exitosamente!</h3>

        <p>Lo invitamos a descargar la planilla de registro. </p>
        <div class="col-md-12 col-sm-12">
          <form enctype="multipart/form-data" action="/LaTesis/public/planesPrestador/exitosa/descargar" method="POST" role="form">
          {{csrf_field()}}
          <div class="row">
          <div class="col-md-6">
          <label for="">Descargar Planilla</label>
          <a href="{{route('prestador.planilla')}}" class="pull-right btn btn-primary btn-sm"><i class="fa fa-check"></i> Descargar </a>
        <!--<a href="{{route('sendEmail')}}" class="btn btn-block btn-primary"> Enviar Email </a>-->
          </div>
        <div class="col-md-6">
          <label for="">Imagen</label>
          <input class="custom-file-upload"  required type="file" name="imagen"  data-btn-text="Adjuntar" />
          <small class="text-muted block">Tamaño de Archivo Maximo: 10Mb (zip/pdf/jpg/png)</small>
        </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <br /><br />
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Enviar Archivo</button>
          </div>
        </div>
        </form>
        </div>

      </div>

    </div>
    <hr />

  </div>
</section>
<!-- / -->


@endsection
