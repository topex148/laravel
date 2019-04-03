@extends('layouts.menuInicio')

@section('content')
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

            <form enctype="multipart/form-data" action="/LaTesis/public/zonas/fotos/{{$foto->id}}" method="POST" role="form">

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
							<div class="col-md-6">

							<label for="">Imagen</label>
							<input class="custom-file-upload"  type="file" name="imagen"  value="{{$foto -> imagen}}"  data-btn-text="Seleccionar Archivo" />
							<small class="text-muted block">Tamaño de Archivo Maximo: 10Mb (zip/pdf/jpg/png)</small>

						</div>

						<div class="col-md-6"><!-- select -->
							<label for="">ID Zona</label>
								<select class="form-control" name="id_Zona" value="{{$foto->id_Zona}}">
										<option value="{{$foto->id_Zona}}">--- {{$foto->id_Zona}} ---</option>
										@foreach ($zonas as $zona)
											<option value="{{$zona->id}}">{{$zona->id}}</option>
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
      <a href="/LaTesis/public/zonas" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->

@endsection
