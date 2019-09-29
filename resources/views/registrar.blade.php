@extends('layouts.menuInicio')

@section('content')

<!-- -->
<section>
  <div class="container">

    <div class="row">

      <div class="col-lg-5 col-md-5 col-sm-5">

        <img class="img-fluid" src="demo_files/images/girl_looking-min.jpg" alt="">

      </div>

      <div class="col-lg-7 col-md-7 col-sm-7">
        <h2> BIENVENIDO</h2>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <p>Te invitamos a continuar tu resgistro, selecciona entre las opciones que se te dan a continuación. </p>

        <div class="row">
          <div class="col-sm-4">
            <a href="{{route('registroPrestador')}}" class="btn btn-default btn-featured btn-inverse">
              <span>PRESTADOR</span>
              <i class="et-bike"></i>
            </a>
          </div>
          <div class="col-sm-4">
            <a href="{{route('registroTurista')}}" class="btn btn-danger btn-featured">
              <span>TURISTA</span>
              <i class="et-flag"></i>
            </a>
          </div>
          <div class="col-sm-4">
            <a href="{{route('home')}}" class="btn btn-warning btn-featured">
              <span>OTRO</span>
              <i class="et-tools-2"></i>
            </a>
          </div>
        </div>
        <!--<a href="{{route('sendEmail')}}" class="btn btn-block btn-primary"> Enviar Email </a>-->

      </div>

    </div>
    <hr />

  </div>
</section>
<!-- / -->


@endsection
