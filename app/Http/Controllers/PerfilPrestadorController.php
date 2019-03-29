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
      $itinerarios = Itinerario::paginate();
      return view('perfilPrestador.index', compact ('user', 'itinerarios'), ['prestadores' => $prestadore, 'fotos' => $foto]);
  }

  public function editPrestador(Prestadore $prestadore)
  {
      return view('perfilPrestador.editPrestador', compact ('prestadore'));
  }

  public function updatePrestador(Request $request,  $RIF)
  {
    if($request->hasFile('imagen'))
    {


      $fileNameExt = $request->file('imagen')->getClientOriginalName();
      $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
      $fileExt = $request->file('imagen')->getClientOriginalExtension();
      $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
      $pathToStore = $request->file('imagen')->storeAs('imagen/prestador',$fileNameToStore);
    }

    $post = Prestadore::find($RIF);
    if($request->hasFile('imagen')){
            $post->imagen = $fileNameToStore;
        }

    $post->Telefono = request()->Telefono;
    $post->Nombre = request()->Nombre;
    $post->DescripcionServicio = request()->DescripcionServicio;
    $post->DescripcionPrestador = request()->DescripcionPrestador;
    $post->Facebook = request()->Facebook;
    $post->Twitter = request()->Twitter;
    $post->Instagram = request()->Instagram;

    $post->save();

      return redirect()->route('prestador.index')
        ->with('info', 'Perfil actualizado con exito');
  }

  //Imagenes

  public function create()
  {
    $prestadores = Prestadore::all();
    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();
    $fotos = Foto::all();
    return view('perfilPrestador.createImagen', compact('prestadores', 'zonas', 'atractivos', 'fotos', 'actividades'));
  }

  public function store(Request $request)
  {

  //  $foto = new Foto(request()->all());
    //\Auth::user()->fotos()->save($foto);

    if($request->hasFile('imagen'))
      {
          $fileNameExt = $request->file('imagen')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen')->storeAs('imagen/foto/',$fileNameToStore);
      }


      $post = new Foto;
      if($request->hasFile('imagen')){
                  $post->imagen = $fileNameToStore;
              }


        $post->title = request()->title;
        $post->descripcion = request()->descripcion;
        $post->RIF_Prest = request()->RIF_Prest;
        $post->user_id = \Auth::user()->id;

        $post->save();
      //$foto = Foto::create($request->all());

      return redirect()->route('prestador.index')
        ->with('info', 'Foto creada con exito');
  }

  public function show(Foto $foto)
  {
      return view('perfilPrestador.showImagen', compact ('foto'));
  }

  public function edit(Foto $foto)
  {
    $prestadores = Prestadore::all();
    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();

      return view('perfilPrestador.editImagen', compact ('foto', 'prestadores', 'zonas', 'atractivos', 'actividades'));
  }

  public function update(Request $request,  $id)
  {
    $post = Foto::find($id);

    if($request->hasFile('imagen'))
          {


              $fileNameExt = $request->file('imagen')->getClientOriginalName();
              $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
              $fileExt = $request->file('imagen')->getClientOriginalExtension();
              $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
              $pathToStore = $request->file('imagen')->storeAs('imagen/foto',$fileNameToStore);
          }


          if($request->hasFile('imagen')){
                      $post->imagen = $fileNameToStore;
                  }

            $post->title = request()->title;
            $post->descripcion = request()->descripcion;
            $post->user_id = \Auth::user()->id;

            $post->save();

      //$foto->update($request->all());

      return redirect()->route('prestador.index')
        ->with('info', 'Foto actualizada con exito');
  }

  public function destroy(Foto $foto)
  {
      $foto->delete();

      return back()->with('info', 'Eliminado correctamente');
  }


  //Itinerario

  public function createItine()
  {
      $prestadores = Prestadore::all();
      $paquetes = Package::all();
      $turistas = Turista::all();
      return view('perfilPrestador.createItinerario', compact('prestadores', 'paquetes', 'turistas'));
  }


  public function storeItine(Request $request)
  {

      $itinerario = Itinerario::create($request->all());

      return redirect()->route('prestador.index')
        ->with('info', 'Itinerario creado con exito');
  }


  public function showItine(Request $request ,Itinerario $itinerario)
  {
      return view('perfilPrestador.showItinerario', compact ('itinerario'));
  }


  public function editItine(Itinerario $itinerario)
  {

      $prestadores = Prestadore::all();
      $paquetes = Package::all();
      $turistas = Turista::all();

      return view('perfilPrestador.editItinerario', compact ('itinerario', 'prestadores', 'paquetes', 'turistas'));
  }


  public function updateItine(Request $request, Itinerario $itinerario)
  {

      $itinerario->update($request->all());

      return redirect()->route('prestador.index')
        ->with('info', 'Itinerario actualizado con exito');
  }


  public function destroyItine(Itinerario $itinerario)
  {
      $itinerario->delete();

      return back()->with('info', 'Eliminado correctamente');
  }


}
