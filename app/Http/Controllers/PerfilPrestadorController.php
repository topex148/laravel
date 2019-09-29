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
use App\Subscription;
use App\Plane;
use App\Registro;
use App\Imagene;
use App\Contacto;
use App\ContactarPrestadore;
use App\planillaRegistro;
use Mail;
use App\Mail\Planilla;

class PerfilPrestadorController extends Controller
{
  public function index(User $user)
  {
      $prestadore = Prestadore::all();
      $contacto = ContactarPrestadore::all();
      $foto = Foto::all();
      $itinerarios = Itinerario::paginate();
      return view('perfilPrestador.index', compact ('user', 'itinerarios'), ['contactos' => $contacto, 'prestadores' => $prestadore, 'fotos' => $foto]);
  }

  public function planes()
  {

    $id = Auth::user()->id;
    $prestadore = Prestadore::all();
    $suscripcione = Subscription::all();
    $plane = Plane::all();

    return view("perfilPrestador.planes", compact ('id'), [ 'planes' => $plane, 'suscripciones' => $suscripcione, 'prestadores' => $prestadore]);
  }

  public function planesExito1()
  {

    return view("perfilPrestador.exito");
  }

  public function planesExito2()
  {

    return view("perfilPrestador.exito1");
  }

  public function planesExito3()
  {

    return view("perfilPrestador.exito2");
  }

  public function planesExito4()
  {

    return view("perfilPrestador.exito3");
  }



  public function storePlan()
  {

    $id = Auth::user()->id;
    $prueba= Prestadore::onlyTrashed()->where('userId', $id)->restore();

      $prestadores = Prestadore::all();
      foreach ($prestadores as $prestadore){
        if (($prestadore->userId) == (Auth::user()->id)) {
          $post = Prestadore::find($prestadore->RIF);
          $post->Fecha_Final = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 1 month"));
          $post->save();
          return redirect()->route('home');
        }
      }

  }

  public function storePlan1()
  {

    $id = Auth::user()->id;
    $prueba= Prestadore::onlyTrashed()->where('userId', $id)->restore();

      $prestadores = Prestadore::all();
      foreach ($prestadores as $prestadore){
        if (($prestadore->userId) == (Auth::user()->id)) {
          $post = Prestadore::find($prestadore->RIF);
          $post->Fecha_Final = date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 1 year"));
          $post->save();
          return redirect()->route('home');
        }
      }

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
    $post->DescripcionActividad = request()->DescripcionActividad;
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

    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();
    $fotos = Foto::all();
    return view('perfilPrestador.createImagen', compact( 'zonas', 'atractivos', 'fotos', 'actividades'));
  }

  public function store(Request $request)
  {

    $prestadores = Prestadore::all();
    foreach ($prestadores as $prestadore) {
      if (($prestadore->userId) == (\Auth::user()->id)) {
        $prestador=$prestadore;
      }
    }

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
        $post->RIF_Prest = $prestador->RIF;
        $post->user_id = \Auth::user()->id;

        $post->save();
      //$foto = Foto::create($request->all());

      return redirect()->route('prestador.index')
        ->with('info', 'Foto creada con exito');
  }

  public function show(Foto $foto)
  {
    $prestadores = Prestadore::all();
    foreach ($prestadores as $prestadore) {
      if (($prestadore->userId) == (\Auth::user()->id)) {
        $prestador=$prestadore;
      }
    }
      return view('perfilPrestador.showImagen', compact ('foto', 'prestador'));
  }

  public function edit(Foto $foto)
  {
    $prestadores = Prestadore::all();
    foreach ($prestadores as $prestadore) {
      if (($prestadore->userId) == (\Auth::user()->id)) {
        $prestador=$prestadore;
      }
    }
    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();

      return view('perfilPrestador.editImagen', compact ('foto', 'prestador', 'zonas', 'atractivos', 'actividades'));
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
      $paquetes = Package::all();
      $turistas = Turista::all();
      return view('perfilPrestador.createItinerario', compact( 'paquetes', 'turistas'));
  }


  public function storeItine(Request $request)
  {

      $prestadores = Prestadore::all();
      foreach ($prestadores as $prestadore) {
        if (($prestadore->userId) == (\Auth::user()->id)) {
          $prestador=$prestadore;
        }
      }



        $post = new Itinerario;

          $post->RIF_4 = $prestador->RIF;
          $post->id_P_3 = request()->id_P_3;
          $post->id_Cliente_1 = request()->id_Cliente_1;
          $post->Fecha_Inicio = request()->Fecha_Inicio;
          $post->Fecha_Final = request()->Fecha_Final;

          $post->save();

      return redirect()->route('prestador.index')
        ->with('info', 'Itinerario creado con exito');
  }


  public function showItine(Request $request ,Itinerario $itinerario)
  {
    $prestadores = Prestadore::all();
    foreach ($prestadores as $prestadore) {
      if (($prestadore->userId) == (\Auth::user()->id)) {
        $prestador=$prestadore;
      }
    }
      return view('perfilPrestador.showItinerario', compact ('itinerario', 'prestador'));
  }


  public function editItine(Itinerario $itinerario)
  {

      $prestadores = Prestadore::all();
      foreach ($prestadores as $prestadore) {
        if (($prestadore->userId) == (\Auth::user()->id)) {
          $prestador=$prestadore;
        }
      }
      $paquetes = Package::all();
      $turistas = Turista::all();

      return view('perfilPrestador.editItinerario', compact ('itinerario', 'prestador', 'paquetes', 'turistas'));
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

  public function descargar(){

    $path = storage_path('pdf/prestadorRegistro.pdf');
    return response()->download($path);

  }

  public function upload(Request $request)
  {

    $usuario = Auth::user();

    if($request->hasFile('imagen'))
      {
          $fileNameExt = $request->file('imagen')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen')->storeAs('pdf/prestador/',$fileNameToStore);
      }


      $post = new planillaRegistro;
      if($request->hasFile('imagen')){
                  $post->imagen = $fileNameToStore;
              }

        $post->usuarioNombre= $usuario->name;
        $post->usuarioId = $usuario->id;
        $post->usuarioCorreo = $usuario->email;
        $post->save();

        $objDemo = new \stdClass();
        $objDemo->nombreTurista = $post->usuarioNombre;
        $objDemo->correoTurista = $post->usuarioCorreo;


      Mail::to('meriventura.c.a@gmail.com')->send(new Planilla($objDemo));


      return redirect()->route('home')
        ->with('info', 'Informacion enviada con exito');
  }


}
