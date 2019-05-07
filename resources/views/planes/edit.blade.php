@extends('layouts.menuInicio')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Plan</h2>
						<p class="lead font-lato">Ingresa los datos del Plan.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form enctype="multipart/form-data" action="/LaTesis/public/planes/{{$plane->id}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}


							<div class="row">

								<div class="col-md-6">
									<label for="">Nombre</label>
									<input required type="text"  maxlength="30" value="{{$plane->name}}" class="form-control" name="name" placeholder="Ingrese el Nombre">
								</div>

								<div class="col-md-6">
									<label for="">Descripcion del Plan</label>
									<input required type="text"  maxlength="500" value="{{$plane->descripcion}}" class="form-control" name="descripcion" placeholder="Ingrese la Descripcion del Plan">
								</div>

								</div>

								<div class="row">

									<div class="col-md-6">
										<label for="">precio</label>
										<input required type="number" value="{{$plane->precio}}"  name="precio"  placeholder="Ingrese el precio" >
									</div>

									<div class="col-md-6">
										<!-- custom file upload -->
									<label for="">Imagen del Plan</label>
									<input class="custom-file-upload"  type="file" name="imagen" value="{{$plane-> imagen}}" data-btn-text="Seleccionar Archivo" />
									<small class="text-muted block">Tamaño de Archivo Maximo: 10Mb (zip/pdf/jpg/png)</small>

								</div>

								</div>


							<div class="row">

                <div class="col-md-4">
                  <h5>Publicidad</h5>
                      <select required type="text" value="{{$plane->Publicidad}}" class="form-control select2" name="Publicidad" placeholder="Ingrese el plan al que pertenece" >
                        <option value="{{$plane->Publicidad}}">{{$plane->Publicidad}}</option>
                            <option value="monthly">Mensual</option>
                            <option value="yearly">Anual</option>
                      </select>
                  </div>

                <div class="col-md-4">
                  <h5>Fecha de Inicio</h5>
                  <!-- date picker -->
                  <input type="text" value="{{$plane->Fecha_Inicio}}" class="form-control datepicker" name="Fecha_Inicio" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" placeholder="Ingrese la Fecha de Inicio">


                </div>

                <div class="col-md-4">
                  <h5>Fecha Final</h5>
                  <!-- date picker -->
                  <input type="text" value="{{$plane->Fecha_Final}}" class="form-control datepicker" name="Fecha_Final" data-format="yyyy-mm-dd" data-lang="en" data-RTL="false" placeholder="Ingrese la Fecha Final">


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
      <a href="/LaTesis/public/planes" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
