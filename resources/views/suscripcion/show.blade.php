@extends('layouts.menuInicio')

@section('content')

<!-- CONTACT -->
			<section id="contact">
				<div class="container">
          @foreach($suscripciones as $suscripcione)
          @if(($suscripcione->user_id) == ($user->id))
					<header class="text-center mb-60">
						<h2>Suscriptor {{ $suscripcione->id }}</h2>
						<p class="lead font-lato">Estos son los datos del suscriptor.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<div class="row">

                  <div class="col-md-6">
                    <h3>Nombre</h5>
                    <!-- date picker -->
                    <p><strong>{{ $user->name }}</strong> </p>

                  </div>

                  <div class="col-md-6">
                    <h3>Email</h5>
                    <!-- date picker -->
                    <p><strong>{{ $user->email }}</strong> </p>

                  </div>

              </div>

              <div class="row">

                  <div class="col-md-6">
                    <h3>ID Usuario</h5>
                    <!-- date picker -->
                    <p><strong>{{ $user->id }}</strong> </p>

                  </div>

                  <div class="col-md-6">
                    <h3>Plan de Suscripcion</h5>
                    <!-- date picker -->
                    <p><strong>{{ $suscripcione->stripe_plan }}</strong> </p>

                  </div>

              </div>

					</div>

				</div>
        @endif
        @endforeach
			</div>
			</section>
			<!-- /CONTACT -->

      <!-- BUTTON CALLOUT -->
      <a href="/LaTesis/public/suscripcion" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">

          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
