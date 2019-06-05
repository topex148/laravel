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

        <p>Lo invitamos a seguir trabajando en nuestra plataforma. </p>

        <!--<a href="{{route('sendEmail')}}" class="btn btn-block btn-primary"> Enviar Email </a>-->

      </div>

    </div>
    <hr />

  </div>
</section>
<!-- / -->


@endsection
