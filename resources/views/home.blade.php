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

        <h3>Usted ha iniciado sesion!</h3>

        <p>Le damos la bienvenida a Meriventura, un empresa encargada de promocionar el Turismo de Montaña del Estado Mérida. </p>
        
        <!--<a href="{{route('sendEmail')}}" class="btn btn-block btn-primary"> Enviar Email </a>-->

      </div>

    </div>
    <hr />

  </div>
</section>
<!-- / -->


@endsection
