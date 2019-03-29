@extends('layouts.menuInicio')

@section('content')
@if (($foto->RIF_Prest) == (\Auth::user()->RIF_Prest))
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Foto</h2>
						<p class="lead font-lato">Ingresa los datos del Foto.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form enctype="multipart/form-data" action="/LaTesis/public/perfilPrestador/{{$foto->id}}/imagen" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}

							<div class="row">
                  <div class="col-md-12">
                    <label for="">Titulo</label>
                    <input required type="text" value="{{$foto->title}}" class="form-control" name="title" placeholder="Ingrese el Titulo" >
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-12">
                    <label for="">Descripcion</label>
                    <input required type="text" value="{{$foto->descripcion}}" class="form-control" name="descripcion" placeholder="Ingrese la Descripcion de la Foto">
                  </div>
              </div>

							<div class="row">
							<div class="col-md-12">

							<label for="">Imagen</label>
							<input class="custom-file-upload"  type="file" name="imagen"  value="{{$foto -> imagen}}"  data-btn-text="Seleccionar Archivo" />
							<small class="text-muted block">Tamaño de Archivo Maximo: 10Mb (zip/pdf/jpg/png)</small>

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
      <a href="/LaTesis/public/perfilPrestador" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

			@endif

			@if (($foto->RIF_Prest) != (\Auth::user()->RIF_Prest))
			<!-- -->
			<section>
				<div class="container">

					<div class="row">

						<div class="col-lg-5 col-md-5 col-sm-5">

							<img class="img-fluid" src="{{ asset("demo_files/images/girl_looking-min.jpg") }}" alt="">

						</div>

						<div class="col-lg-7 col-md-7 col-sm-7">
							<h2> ERROR</h2>


							<h3>403 - Acción no autorizada</h3>

							<p>Le recomendamos no ingresar a sitios no autorizados. </p>
						</div>

					</div>
					<hr />

				</div>
			</section>
			<!-- / -->

			@endif

@endsection
