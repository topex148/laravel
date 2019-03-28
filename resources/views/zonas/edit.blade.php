@extends('layouts.menuInicio')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Zona</h2>
						<p class="lead font-lato">Ingresa los datos de la Zona.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form action="/LaTesis/public/zonas/{{$zona->id}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}

							<div class="row">

									<div class="col-md-6">
										<h5>Nombre</h5>
										<!-- date picker -->
										<input type="text" value="{{$zona->nombre}}" class="form-control"  name="nombre"
										 placeholder="Ingrese el Nombre">

									</div>

									<div class="col-md-6">
										<h5>Descripcion de la Zona</h5>
										<!-- date picker -->
										<input type="text" value="{{$zona->Descripcion_Zona}}" class="form-control" name="Descripcion_Zona"
										 placeholder="Ingrese la Descripcion de la Zona">

									</div>
							</div>


							<!--	</fieldset>-->

								<div class="row">
									<div class="col-md-12">
										  <br /><br />
										<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Actualizar</button>
									</div>
								</div>
							</form>

						</div>
						<!-- /FORM -->




					</div>

				</div>
			</section>
			<!-- /CONTACT -->

      <!-- BUTTON CALLOUT -->
      <a href="/LaTesis/public/zonas" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
