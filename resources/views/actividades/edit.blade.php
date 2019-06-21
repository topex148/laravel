@extends('layouts.menuInicio')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Actividad</h2>
						<p class="lead font-lato">Ingresa los datos de la actividad.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form action="/LaTesis/public/actividades/{{$actividade->id}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}

								<div class="row">

                  <div class="col-md-4">
                    <h5>Titulo</h5>
                    <!-- date picker -->
                    <input type="text" value="{{$actividade->titulo}}" class="form-control" name="titulo"  placeholder="Ingrese el Titulo">

                  </div>

                  <div class="col-md-4">
                    <h5>Descripcion</h5>
                    <!-- date picker -->
                    <input type="text" value="{{$actividade->descripcion}}" class="form-control" name="descripcion"  placeholder="Ingrese la Descripcion">

                  </div>

									<div class="col-md-4"><!-- select -->
										<h5>Id de paquete</h5>
											<select class="form-control" name="id_P_3" value="{{old('id_P_3')}}">
													<option value="">--- Selecccionar para cambiar ---</option>
													@foreach ($paquetes as $paquete)
														<option value="{{$paquete->id}}">Paquete Número: {{$paquete->id}}</option>
													@endforeach
											</select>
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
      <a href="/LaTesis/public/actividades" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
