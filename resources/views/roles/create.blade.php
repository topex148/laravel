@extends('layouts.menuInicio')

@section('content')


<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Rol</h2>
						<p class="lead font-lato">Ingresa los datos del rol.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Registrar!</em></strong></h3>


							<form action="/LaTesis/public/roles/store" method="POST" permission="form">

                {{csrf_field()}}

							  <!--<fieldset>-->
									<!--<input type="hidden" name="action" value="contact_send" />-->

									<div class="row">

											<div class="col-md-4">
	                      <h5>Nombre</h5>
	                      <!-- date picker -->
	                      <input type="text" value="{{old('name')}}" class="form-control" name="name"  placeholder="Ingrese el rol">

	                    </div>

	                    <div class="col-md-4">
	                      <h5>URL Amigable</h5>
	                      <!-- date picker -->
	                      <input type="text" value="{{old('slug')}}" class="form-control"  name="slug" placeholder="Ingrese el URL Amigable">

	                    </div>

                      <div class="col-md-4">
                        <h5>Descripcion</h5>
                        <!-- date picker -->
                        <input type="text" value="{{old('description')}}" class="form-control" name="description" placeholder="Ingrese la Descripcion">

                      </div>
									</div>

									<hr>
									<h3>Permiso especial</h3>
									<div class="form-group">
											<label>{{ Form::radio('special', 'all-access') }} Acceso total</label>
											<label>{{ Form::radio('special', 'no-access') }} Ningun acceso</label>
									</div>


									<hr>
									<h3>Lista de permisos</h3>
									<div class="form-group">
											<ul class="list-unstyled">
												@foreach($permissions as $permission)
												<li>
													<label>
													{{Form::checkbox('permissions[]', $permission->id, null)}}
													{{ $permission->name }}
													<em>({{ $permission->description ?:'N/A' }})</em>
													</label>
												</li>
												@endforeach
											<ul>
										</div>



							<!--	</fieldset>-->

								<div class="row">
									<div class="col-md-12">
										  <br /><br />
										<button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Registrar</button>
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
			<a href="/LaTesis/public/roles" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
				<span class="font-lato fs-30">

					<strong>Regresar &raquo;</strong>
				</span>
			</a>

			<!-- BUTTON CALLOUT -->
@endsection
