@extends('layouts.menuInicio')

@section('content')
<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Contacto</h2>
						<p class="lead font-lato">Ingresa los datos del contacto.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form enctype="multipart/form-data" action="/LaTesis/public/contactos/{{$contacto->id}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}

							<div class="row">
									<div class="col-md-4">
										<label for="">Nombre completo *</label>
										<input required type="text" value="{{$contacto->nombre}}" class="form-control" name="nombre" placeholder="Ingrese su Nombre">
									</div>
									<div class="col-md-4">
										<label for="">Dirección E-mail *</label>
										<input required type="email" value="{{$contacto->correo}}" class="form-control" name="correo" placeholder="Ingrese su Correo">
									</div>
									<div class="col-md-4">
										<label for="">Teléfono </label>
										<div class="fancy-form">
										<i class="fa fa-phone-square"></i>
										<input required type="text"  maxlength="10" class="form-control masked" data-format="(999) 999-9999"
										 data-placeholder="X" value="{{$contacto->Telefono}}"  name="Telefono" placeholder="Ingrese su Numero de Telefono">
									</div>
									</div>
							</div>
							<div class="row">
									<div class="col-md-8">
										<label for="">Asunto *</label>
										<input required type="text" value="{{$contacto->Asunto}}" class="form-control" name="Asunto" placeholder="Ingrese el Asunto">
									</div>
									<div class="col-md-4">
										<label for="">Área </label>
										<select  required class="form-control pointer"  name="Area" value="{{$contacto->Area}}">
											<option value="{{$contacto->Area}}">Area: "{{$contacto->Area}}" </option>
											<option value="Turista">Turista</option>
											<option value="Prestador de Servicio">Prestador de Servicio</option>
											<option value="Guía turístico">Guía turístico </option>
										</select>
									</div>
							</div>
							<div class="row">
									<div class="col-md-12">
										<label for="">Mensaje *</label>
										<input required type="text" value="{{$contacto->Mensaje}}" class="form-control" name="Mensaje" placeholder="Ingrese el Mensaje">
									</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<!-- custom file upload -->
								<label for="">Archivo</label>
								<input class="custom-file-upload" value="{{$contacto-> archivo}}" type="file" name="archivo"  data-btn-text="Seleccionar Archivo" />
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
      <a href="/LaTesis/public/contactos" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
