@extends('layouts.menuInicio')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Publicidad</h2>
						<p class="lead font-lato">Ingresa los datos de la Publicidad.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form enctype="multipart/form-data" action="/LaTesis/public/publicidad/{{$publicidad->id}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}

							<div class="row">
                  <div class="col-md-6">
                    <label for="">Titulo</label>
                    <input required type="text" value="{{$publicidad->title}}" class="form-control" name="title" placeholder="Ingrese el Titulo" >
                  </div>

									<div class="col-md-6">

									<label for="">Imagen</label>
									<input class="custom-file-upload"  type="file" name="imagen"  value="{{$publicidad -> imagen}}"  data-btn-text="Seleccionar Archivo" />
									<small class="text-muted block">Tamaño de Archivo Maximo: 10Mb (zip/pdf/jpg/png)</small>

								</div>

              </div>

							<div class="row">


								<div class="col-md-6">
									<h5>Fecha Final</h5>
									<!-- date picker -->
									<input type="text" value="{{$publicidad->Fecha_Final}}" class="form-control datepicker" name="Fecha_Final" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" placeholder="Ingrese la Fecha Final">

								</div>

								<div class="col-md-6"><!-- select -->
									<label for="">RIF Prestador</label>
										<select class="form-control" name="RIF_Prest" value="{{$publicidad->RIF_Prest}}">
												<option value="{{$publicidad->RIF_Prest}}">--- {{$publicidad->RIF_Prest}} ---</option>
												@foreach ($prestadores as $prestadore)
													<option value="{{$prestadore->RIF}}">{{$prestadore->RIF}}---{{$prestadore->Nombre}}</option>
												@endforeach
										</select>
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
      <a href="/LaTesis/public/publicidad" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
