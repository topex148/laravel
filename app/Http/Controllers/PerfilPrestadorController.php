<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Input;
use Image;
use App\User;
use App\Prestadore;
use App\Itinerario;
use App\Turista;
use App\Actividade;
use App\Package;
use App\Foto;
use App\Zona;
use App\Atractivo;
use App\Plane;
use App\Registro;
use App\Imagene;
use App\Contacto;
use Mail;

class PerfilPrestadorController extends Controller
{
  public function index(User $user)
  {
      $prestadore = Prestadore::all();
      $foto = Foto::all();
      return view('perfilPrestador.index', compact ('user'), ['prestadores' => $prestadore, 'fotos' => $foto]);
  }

  public function createImagen()
  {
      return view('perfilPrestador.createImagen');
  }

  public function createItinerario()
  {
      return view('perfilPrestador.createItinerario');
  }

  public function storeImagen(Request $request)
  {
      return redirect()->route('perfilPrestador.index')
        ->with('info', 'Imagen creada con exito');
  }

  public function storeItinerario(Request $request)
  {
      return redirect()->route('perfilPrestador.index')
        ->with('info', 'Itinerario creado con exito');
  }

  public function showImagen()
  {
      return view('perfilPrestador.showImagen');
  }

  public function showItinerario()
  {
      return view('perfilPrestador.showItinerario');
  }

  public function editImagen()
  {
      return view('perfilPrestador.editImagen');
  }

  public function editItinerario()
  {
      return view('perfilPrestador.editItinerario');
  }

  public function updateImagen(Request $request)
  {
      return redirect()->route('perfilPrestador.index')
        ->with('info', 'Imagen actualizada con exito');
  }

  public function updateItinerario(Request $request)
  {
      return redirect()->route('perfilPrestador.index')
        ->with('info', 'Itinerario actualizado con exito');
  }

  public function destroyImagen()
  {

      return back()->with('info', 'Eliminado correctamente');
  }

  public function destroyItinerario()
  {

      return back()->with('info', 'Eliminado correctamente');
  }

  public function updatePerfil(Request $request)
  {
      return redirect()->route('perfilPrestador.index')
        ->with('info', 'Perfil actualizado con exito');
  }

}
