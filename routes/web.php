<?php
use Illuminate\Http\Request;
use Conner\Tagging\Providers\TaggingServiceProvider;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Paginas Iniciales

Route::get('/inicio', 'ControladorPrincipal@inicio');
Route::post("/inicio", "ControladorPrincipal@inicioContactoGuardar");
Route::get('/nosotros', 'ControladorPrincipal@nosotros');
Route::get('/atractivoLista', 'ControladorPrincipal@atractivoLista');
Route::get('/atractivoLista/{atractivo}/atractivo', 'ControladorPrincipal@atractivo');
Route::get('/zonaLista', 'ControladorPrincipal@zonaLista');
Route::get('/zonaLista/{zona}/zona', 'ControladorPrincipal@zona');
Route::get('/actividadLista', 'ControladorPrincipal@actividadLista');
Route::get('/actividad', 'ControladorPrincipal@actividad');
Route::get('/servicioLista', 'ControladorPrincipal@servicioLista');
Route::get('/servicioLista/{prestadore}/prestador', 'ControladorPrincipal@servicio');
Route::get('/contacto', 'ControladorPrincipal@contacto');
Route::post("/contacto", "ControladorPrincipal@contactoGuardar");
Route::get('/galeria', 'ControladorPrincipal@galeria');

//Final Paginas Iniciales

//Autentificacion

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route

Route::middleware(['auth'])->group(function(){

  //Roles

  Route::post('roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');

  Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

  Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');

  Route::patch('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');

  Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

  Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

  Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');


  //Packages

  Route::post('packages/store', 'PackageController@store')->name('packages.store')
        ->middleware('permission:packages.create');

  Route::get('packages', 'PackageController@index')->name('packages.index')
        ->middleware('permission:packages.index');

  Route::get('packages/create', 'PackageController@create')->name('packages.create')
        ->middleware('permission:packages.create');

  Route::patch('packages/{package}', 'PackageController@update')->name('packages.update')
        ->middleware('permission:packages.edit');

  Route::get('packages/{package}', 'PackageController@show')->name('packages.show')
        ->middleware('permission:packages.show');

  Route::delete('packages/{package}', 'PackageController@destroy')->name('packages.destroy')
        ->middleware('permission:packages.destroy');

  Route::get('packages/{package}/edit', 'PackageController@edit')->name('packages.edit')
        ->middleware('permission:packages.edit');

  //Users

  Route::get('users', 'UserController@index')->name('users.index')
        ->middleware('permission:users.index');

  Route::patch('users/{user}', 'UserController@update')->name('users.update')
        ->middleware('permission:users.edit');

  Route::get('users/{user}', 'UserController@show')->name('users.show')
        ->middleware('permission:users.show');

  Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');

  Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
        ->middleware('permission:users.edit');

  //Actividades

  Route::post('actividades/store', 'ActividadeController@store')->name('actividades/.store')
        ->middleware('permission:actividades/.create');

  Route::get('actividades', 'ActividadeController@index')->name('actividades.index')
        ->middleware('permission:actividades.index');

  Route::get('actividades/create', 'ActividadeController@create')->name('actividades.create')
        ->middleware('permission:actividades.create');

  Route::patch('actividades/{actividade}', 'ActividadeController@update')->name('actividades.update')
        ->middleware('permission:actividades.edit');

  Route::get('actividades/{actividade}', 'ActividadeController@show')->name('actividades.show')
        ->middleware('permission:actividades.show');

  Route::delete('actividades/{actividade}', 'ActividadeController@destroy')->name('actividades.destroy')
        ->middleware('permission:actividades.destroy');

  Route::get('actividades/{actividade}/edit', 'ActividadeController@edit')->name('actividades.edit')
        ->middleware('permission:actividades.edit');

        //Atractivos

  Route::post('atractivos/store', 'AtractivoController@store')->name('atractivos.store')
        ->middleware('permission:Atractivos.create');

  Route::get('atractivos', 'AtractivoController@index')->name('atractivos.index')
        ->middleware('permission:atractivos.index');

  Route::get('atractivos/create', 'AtractivoController@create')->name('atractivos.create')
        ->middleware('permission:atractivos.create');

  Route::patch('atractivos/{atractivo}', 'AtractivoController@update')->name('atractivos.update')
        ->middleware('permission:atractivos.edit');

  Route::get('atractivos/{atractivo}', 'AtractivoController@show')->name('atractivos.show')
        ->middleware('permission:atractivos.show');

  Route::delete('atractivos/{atractivo}', 'AtractivoController@destroy')->name('atractivos.destroy')
        ->middleware('permission:atractivos.destroy');

  Route::get('atractivos/{atractivo}/edit', 'AtractivoController@edit')->name('atractivos.edit')
        ->middleware('permission:atractivos.edit');

  //Contactos

  Route::post('contactos/store', 'ContactoController@store')->name('contactos.store')
        ->middleware('permission:contactos.create');

  Route::get('contactos', 'ContactoController@index')->name('contactos.index')
        ->middleware('permission:contactos.index');

  Route::get('contactos/create', 'ContactoController@create')->name('contactos.create')
        ->middleware('permission:contactos.create');

  Route::patch('contactos/{contacto}', 'ContactoController@update')->name('contactos.update')
        ->middleware('permission:contactos.edit');

  Route::get('contactos/{contacto}', 'ContactoController@show')->name('contactos.show')
        ->middleware('permission:contactos.show');

  Route::delete('contactos/{contacto}', 'ContactoController@destroy')->name('contactos.destroy')
        ->middleware('permission:contactos.destroy');

  Route::get('contactos/{contacto}/edit', 'ContactoController@edit')->name('contactos.edit')
        ->middleware('permission:contactos.edit');

  //Fotos

  Route::post('fotos/store', 'FotoController@store')->name('fotos.store')
        ->middleware('permission:fotos.create');

  Route::get('fotos', 'FotoController@index')->name('fotos.index')
        ->middleware('permission:fotos.index');

  Route::get('fotos/create', 'FotoController@create')->name('fotos.create')
        ->middleware('permission:fotos.create');

  Route::patch('fotos/{foto}', 'FotoController@update')->name('fotos.update')
        ->middleware('permission:fotos.edit');

  Route::get('fotos/{foto}', 'FotoController@show')->name('fotos.show')
        ->middleware('permission:fotos.show');

  Route::delete('fotos/{foto}', 'FotoController@destroy')->name('fotos.destroy')
        ->middleware('permission:fotos.destroy');

  Route::get('fotos/{foto}/edit', 'FotoController@edit')->name('fotos.edit')
        ->middleware('permission:fotos.edit');

  //Itinerarios

  Route::post('itinerarios/store', 'ItinerarioController@store')->name('itinerarios.store')
        ->middleware('permission:itinerarios.create');

  Route::get('itinerarios', 'ItinerarioController@index')->name('itinerarios.index')
        ->middleware('permission:itinerarios.index');

  Route::get('itinerarios/create', 'ItinerarioController@create')->name('itinerarios.create')
        ->middleware('permission:itinerarios.create');

  Route::patch('itinerarios/{itinerario}', 'ItinerarioController@update')->name('itinerarios.update')
        ->middleware('permission:itinerarios.edit');

  Route::get('itinerarios/{itinerario}', 'ItinerarioController@show')->name('itinerarios.show')
        ->middleware('permission:itinerarios.show');

  Route::delete('itinerarios/{itinerario}', 'ItinerarioController@destroy')->name('itinerarios.destroy')
        ->middleware('permission:itinerarios.destroy');

  Route::get('itinerarios/{itinerario}/edit', 'ItinerarioController@edit')->name('itinerarios.edit')
        ->middleware('permission:itinerarios.edit');

  //Planes

  Route::post('planes/store', 'PlaneController@store')->name('planes.store')
        ->middleware('permission:planes.create');

  Route::get('planes', 'PlaneController@index')->name('planes.index')
        ->middleware('permission:planes.index');

  Route::get('planes/create', 'PlaneController@create')->name('planes.create')
        ->middleware('permission:planes.create');

  Route::patch('planes/{plane}', 'PlaneController@update')->name('planes.update')
        ->middleware('permission:planes.edit');

  Route::get('planes/{plane}', 'PlaneController@show')->name('planes.show')
        ->middleware('permission:planes.show');

  Route::delete('planes/{plane}', 'PlaneController@destroy')->name('planes.destroy')
        ->middleware('permission:planes.destroy');

  Route::get('planes/{plane}/edit', 'PlaneController@edit')->name('planes.edit')
        ->middleware('permission:planes.edit');

  //Prestadores

  Route::post('prestadores/store', 'PrestadoreController@store')->name('prestadores.store')
        ->middleware('permission:prestadores.create');

  Route::get('prestadores', 'PrestadoreController@index')->name('prestadores.index')
        ->middleware('permission:prestadores.index');

  Route::get('prestadores/create', 'PrestadoreController@create')->name('prestadores.create')
        ->middleware('permission:prestadores.create');

  Route::patch('prestadores/{prestadore}', 'PrestadoreController@update')->name('prestadores.update')
        ->middleware('permission:prestadores.edit');

  Route::get('prestadores/{prestadore}', 'PrestadoreController@show')->name('prestadores.show')
        ->middleware('permission:prestadores.show');

  Route::delete('prestadores/{prestadore}', 'PrestadoreController@destroy')->name('prestadores.destroy')
        ->middleware('permission:prestadores.destroy');

  Route::get('prestadores/{prestadore}/edit', 'PrestadoreController@edit')->name('prestadores.edit')
        ->middleware('permission:prestadores.edit');

  //Turistas

  Route::post('turistas/store', 'TuristaController@store')->name('turistas.store')
        ->middleware('permission:turistas.create');

  Route::get('turistas', 'TuristaController@index')->name('turistas.index')
        ->middleware('permission:turistas.index');

  Route::get('turistas/create', 'TuristaController@create')->name('turistas.create')
        ->middleware('permission:turistas.create');

  Route::patch('turistas/{turista}', 'TuristaController@update')->name('turistas.update')
        ->middleware('permission:turistas.edit');

  Route::get('turistas/{turista}', 'TuristaController@show')->name('turistas.show')
        ->middleware('permission:turistas.show');

  Route::delete('turistas/{turista}', 'TuristaController@destroy')->name('turistas.destroy')
        ->middleware('permission:turistas.destroy');

  Route::get('turistas/{turista}/edit', 'TuristaController@edit')->name('turistas.edit')
        ->middleware('permission:turistas.edit');

  //Zonas

  Route::post('zonas/store', 'ZonaController@store')->name('zonas.store')
        ->middleware('permission:zonas.create');

  Route::get('zonas', 'ZonaController@index')->name('zonas.index')
        ->middleware('permission:zonas.index');

  Route::get('zonas/create', 'ZonaController@create')->name('zonas.create')
        ->middleware('permission:zonas.create');

  Route::patch('zonas/{zona}', 'ZonaController@update')->name('zonas.update')
        ->middleware('permission:zonas.edit');

  Route::get('zonas/{zona}', 'ZonaController@show')->name('zonas.show')
        ->middleware('permission:zonas.show');

  Route::delete('zonas/{zona}', 'ZonaController@destroy')->name('zonas.destroy')
        ->middleware('permission:zonas.destroy');

  Route::get('zonas/{zona}/edit', 'ZonaController@edit')->name('zonas.edit')
        ->middleware('permission:zonas.edit');

  //Perfil Prestador

  Route::get('perfilPrestador', 'PerfilPrestadorController@index')->name('prestador.index')
        ->middleware('permission:prestador.index');

  //Editar Prestador
  Route::get('perfilPrestador/{prestadore}/edit', 'PerfilPrestadorController@editPrestador')->name('perfil.edit')
        ->middleware('permission:perfil.edit');

  Route::patch('perfilPrestador/{prestadore}', 'PerfilPrestadorController@updatePrestador')->name('perfil.update')
        ->middleware('permission:perfil.edit');

  //Imagenes Prestador

  Route::get('perfilPrestador/create', 'PerfilPrestadorController@create')->name('imagen.create')
        ->middleware('permission:imagen.create');

  Route::post('perfilPrestador/store', 'PerfilPrestadorController@store')->name('imagen.store')
        ->middleware('permission:imagen.create');

  Route::get('perfilPrestador/{foto}/editImagen', 'PerfilPrestadorController@edit')->name('imagen.edit')
        ->middleware('permission:imagen.edit');

  Route::patch('perfilPrestador/{foto}/imagen', 'PerfilPrestadorController@update')->name('imagen.update')
        ->middleware('permission:imagen.edit');

  Route::get('perfilPrestador/{foto}', 'PerfilPrestadorController@show')->name('imagen.show')
        ->middleware('permission:imagen.show');

  Route::delete('perfilPrestador/{foto}', 'PerfilPrestadorController@destroy')->name('imagen.destroy')
        ->middleware('permission:imagen.destroy');

  //Itinerarios Prestador

  Route::get('perfilPrestador/create/itinerario', 'PerfilPrestadorController@createItine')->name('itine.create')
        ->middleware('permission:itine.create');

  Route::post('perfilPrestador/store/itinerario', 'PerfilPrestadorController@storeItine')->name('itine.store')
        ->middleware('permission:itine.create');

  Route::get('perfilPrestador/{itinerario}/editItinerario', 'PerfilPrestadorController@editItine')->name('itine.edit')
        ->middleware('permission:itine.edit');

  Route::patch('perfilPrestador/{itinerario}/itinerario', 'PerfilPrestadorController@updateItine')->name('itine.update')
        ->middleware('permission:itine.edit');

  Route::get('perfilPrestador/{itinerario}/itinerarios', 'PerfilPrestadorController@showItine')->name('itine.show')
        ->middleware('permission:itine.show');

  Route::delete('perfilPrestador/{itinerario}/deleteItinerario', 'PerfilPrestadorController@destroyItine')->name('itine.destroy')
        ->middleware('permission:itine.destroy');

});
