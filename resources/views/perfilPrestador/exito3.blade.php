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

        <p>Lo invitamos a usar nuestra aplicacion. </p>

      </br>

        <div class="text-center">
        <a href="{{route('home')}}" class="btn btn-3d btn-xlg btn-red">
          SUBSCRIPCION EXITOSA
          <span class="block font-lato">Presiona este boton para continuar!</span>
        </a>
        </div>

      </div>

    </div>


  </div>
</section>
<!-- / -->


@endsection
