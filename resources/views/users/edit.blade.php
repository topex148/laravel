@extends('layouts.menuInicio')

@section('content')

<!-- CONTACT -->
			<section id="contact">
				<div class="container">

					<header class="text-center mb-60">
						<h2>Formulario Usuario</h2>
						<p class="lead font-lato">Ingresa los datos del usuario.</p>
						<hr />
					</header>


					<div class="row">

						<!-- FORM -->
						<div class="col-md-12 col-sm-12">

							<h3>Verifica los datos antes de seleccionar <strong><em>Actualizar!</em></strong></h3>

            <form action="/LaTesis/public/users/{{$user->id}}" method="POST" role="form">

              {{method_field('PATCH')}}
              {{csrf_field()}}

								<div class="row">

                  <div class="col-md-4">
                    <h5>Nombre</h5>
                    <!-- date picker -->
                    <input type="text" value="{{$user->name}}" class="form-control" name="name"  data-lang="en" data-RTL="false" placeholder="Ingrese el nombre">

                  </div>

                  <div class="col-md-4">
                    <h5>Email</h5>
                    <!-- date picker -->
                    <input type="text" value="{{$user->email}}" class="form-control" name="email"  data-lang="en" data-RTL="false" placeholder="Ingrese el email">

                  </div>

									<div class="col-md-4"><!-- select -->
										<label for="">RIF Prestador</label>
											<select class="form-control" name="RIF_Prest" value="{{$user->RIF_Prest}}">
													<option value="{{$user->RIF_Prest}}">--- Seleccione el RIF del prestador ---</option>
													@foreach ($prestadores as $prestadore)
														<option value="{{$prestadore->RIF}}">{{$prestadore->RIF}} --- {{$prestadore->Nombre}}</option>
													@endforeach
											</select>
									</div>

								</div>


									<hr>
									<h3>Lista de roles</h3>
									<div class="form-group">
											<ul class="list-unstyled">
												@foreach($roles as $role)
												<li>
													<label>
													{{Form::checkbox('roles[]', $role->id, null)}}
													{{ $role->name }}
													<em>({{ $role->description ?:'N/A' }})</em>
													</label>
												</li>
												@endforeach
											<ul>
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
      <a href="/LaTesis/public/users" rel="nofollow" class="btn btn-xlg btn-warning fs-20 fullwidth m-0 rad-0 p-40">
        <span class="font-lato fs-30">
          Si no esta seguro sobre esta accion!
          <strong>Regresar &raquo;</strong>
        </span>
      </a>

      <!-- BUTTON CALLOUT -->
@endsection
