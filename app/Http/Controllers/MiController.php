<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Input;
use Image;
use App\Prestadore;
use App\Itinerario;
use App\Turista;
use App\Actividade;
use App\Paquete;
use App\Foto;
use App\Zona;
use App\Atractivo;
use App\Plane;
use App\Registro;
use App\Imagene;
use App\Contacto;
use Mail;


class MiController extends Controller
{
  /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    return view("welcome");
}

public function phpinfo()
{
    return view("phpinfo");
}


/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */


public function activity(Request $request)
{
    $foto = Foto::all();
    $notes = Prestadore::all();
    $actividad = Actividade::all();
    return view("actividad", ['fotos' => $foto, 'prestadores' => $notes, 'actividades' => $actividad]);
}


public function contactar(Request $request)
{
    $foto = Foto::all();
    $notes = Contacto::all();
    return view("contacto",['contactos' => $notes], ['fotos' => $foto]);
}

public function guardarContactar(Request $request)
{

  if($request->hasFile('archivo'))
  {


      $fileNameExt = $request->file('archivo')->getClientOriginalName();
      $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
      $fileExt = $request->file('archivo')->getClientOriginalExtension();
      $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
      $pathToStore = $request->file('archivo')->storeAs('imagen/contactar/',$fileNameToStore);
  }

  $post = new Contacto;
  if($request->hasFile('archivo')){
              $post->archivo = $fileNameToStore;
          }
  $post->nombre = request()->nombre;
  $post->correo = request()->correo;
  $post->Telefono = request()->Telefono;
  $post->Mensaje = request()->Mensaje;
  $post->Area = request()->Area;
  $post->Asunto = request()->Asunto;

  $post->save();

  $subject = "Solicitud de Contacto";
  $for = "topex148@gmail.com";
        Mail::send('email',$request->all(), function($msj) use($subject,$for){
            $msj->from("danielpaypal148@gmail.com","Meriventura");
            $msj->subject($subject);
            $msj->to($for);
        });



    //Prestadore::create($request->all());
    return redirect ('/contacto');

}

public function contacto(Request $request)
{
    $request->user()->authorizeRoles(['gerente']);
    $notes = Contacto::all();

    return view("contactos", ['contactos' => $notes]);
}

public function eliminarContacto(Request $request , Contacto $note){

  $request->user()->authorizeRoles(['gerente']);
  return view('contactoEliminar', compact('note'));
}

public function borrarContacto(Contacto $note){
  $note->delete();
  return redirect ('/Contactos');
}

public function csuspender(Request $request)
{
  $request->user()->authorizeRoles(['gerente']);
  $suspe = Contacto::onlyTrashed()->get();


    return view("csuspender",['contactos' => $suspe]);
}


public function suspenderContacto(Request $request, $id){
  $request->user()->authorizeRoles(['gerente']);
  $prueba= Contacto::onlyTrashed()->where('id', $id)->restore();
  return redirect ('/Contactos/suspender');
}

public function deleteContacto(Request $request, $id){
  $request->user()->authorizeRoles(['gerente']);
  $prueba= Contacto::onlyTrashed()->where('id', $id)->forceDelete();
  return redirect ('/Contactos/suspender');
}
public function informacionContacto(Request $request , Contacto $note){

  $request->user()->authorizeRoles(['gerente']);
  return view('informacionContacto', compact('note'));
}



public function home(Request $request)
{
    $foto = Foto::all();
    $actividad = Actividade::all();

    return view("index", ['fotos' => $foto, 'actividades' => $actividad]);
}

public function fotos(Request $request)
{
    $foto = Foto::all();

    return view("galeria", ['fotos' => $foto]);
}

public function perfil(Request $request)
{
    $foto = Foto::all();
    return view("guia1", ['fotos' => $foto]);
}

public function listas(Request $request)
{
    $foto = Foto::all();
    $notes = Prestadore::all();
    return view("servicios", ['prestadores' => $notes, 'fotos' => $foto]);
}

public function servicios(Request $request , Prestadore $note)
{

    $foto = Foto::all();
    return view("servicio1", compact('note'), ['fotos' => $foto]);
}

public function serviciosGaleria(Request $request , Prestadore $note)
{
    $request->user()->authorizeRoles(['prestador']);
    $prestadores = Prestadore::all();

    $foto = Foto::all();
    return view("servicioGaleria", compact('prestadores','note'), ['fotos' => $foto]);
}


public function guardarFoto(Request $request)
{


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

    $post->save();


      return redirect()->back();
}

public function editarFoto(Request $request , Prestadore $note,  Foto $notes){

  $prestadores = Prestadore::all();
  $zonas = Zona::all();
  $atractivos = Atractivo::all();
  $foto = Foto::all();

  $request->user()->authorizeRoles(['prestador']);
  return view('servicioGaleriaEditar', compact('note', 'notes', 'prestadores', 'zonas', 'atractivos'), ['fotos' => $foto]);


}

public function actualizarFoto(Request $request, $id){

    $post = Foto::find($id);


  if($request->hasFile('imagen'))
        {


      $fileNameExt = $request->file('imagen')->getClientOriginalName();
      $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
      $fileExt = $request->file('imagen')->getClientOriginalExtension();
      $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
      $pathToStore = $request->file('imagen')->storeAs('imagen/foto',$fileNameToStore);
      }


      $post->RIF_Prest = request()->RIF_Prest;

      $post->title = request()->title;
      $post->descripcion = request()->descripcion;


      if($request->hasFile('imagen')){
                  $post->imagen = $fileNameToStore;
              }

      $post->save();


    return redirect()->back();

}

public function eliminarFoto(Request $request , Prestadore $note,  Foto $notes){

  $foto = Foto::all();
  $request->user()->authorizeRoles(['prestador']);
  return view('prestadorFotoEliminar', compact('note','notes'), ['fotos' => $foto]);

}

public function borrarFoto(Foto $notes, Prestadore $note){
  Storage::delete('imagen/foto/'. $notes->imagen);
  $notes->delete();
  return redirect()->back();
}

public function Fotosuspender(Request $request, Prestadore $note)
{
  $foto = Foto::all();

  $suspe = Foto::onlyTrashed()->get();
  $request->user()->authorizeRoles(['prestador']);

    return view("prestadorFotoSuspender", compact('note'),['fotos' => $suspe, 'fotos' => $foto]);
}

public function suspenderFoto(Request $request, $id){
  $request->user()->authorizeRoles(['prestador']);
  $prueba= Foto::onlyTrashed()->where('id', $id)->restore();
  return redirect()->back();
}

public function deleteFoto(Request $request, $id){
  $request->user()->authorizeRoles(['prestador']);
  $prueba= Foto::onlyTrashed()->where('id', $id)->forceDelete();
  return redirect()->back();
}

public function editarPrestador(Request $request , Prestadore $note){

  $foto = Foto::all();
  $request->user()->authorizeRoles(['prestador']);
  return view('editarPrestador', compact('note'), ['fotos' => $foto]);
}



public function actualizarPrestador(Request $request,  $RIF){

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
  $post->RIF = request()->RIF;
  $post->Telefono = request()->Telefono;
  $post->RTN = request()->RTN;
  $post->Nombre = request()->Nombre;
  $post->DescripcionServicio = request()->DescripcionServicio;
  $post->DescripcionPrestador = request()->DescripcionPrestador;
  $post->Facebook = request()->Facebook;
  $post->Twitter = request()->Twitter;
  $post->Instagram = request()->Instagram;

  $post->save();


  //$note->update(request()->all());
  return redirect()->back();
}



public function itinerario(Request $request, Prestadore $note)
{
    $prestadores = Prestadore::all();
    $turistas = Turista::all();
    $paquetes = Paquete::all();
    $foto = Foto::all();
    $notes =  \Auth::user()->itinerarios()->get();
    $request->user()->authorizeRoles(['prestador']);
    return view("PrestadorItinerario", ['itinerarios' => $notes, 'fotos' => $foto], compact('prestadores', 'paquetes', 'turistas','note'));
}

public function guardarItinerario(Request $request)
{

    $itinerario = new Itinerario(request()->all());
    \Auth::user()->itinerarios()->save($itinerario);

    return redirect()->back();
}

public function actualizarItinerario(Itinerario $note){
  $note->update(request()->all());
  return redirect()->back();
}

//public function actualizarItinerario(Itinerario $note, $id){
//  $post = Itinerario::find($id);
//  $post->RIF_4 = request()->RIF_4;
//  $post->id_P_3 = request()->id_P_3;
//  $post->id_Cliente_1 = request()->id_Cliente_1;
//  $post->Fecha_Inicio = request()->Fecha_Inicio;
//  $post->Fecha_Final = request()->Fecha_Final;


//  $post->save();
//  return redirect()->back();
//}


public function editarItinerario(Request $request , Prestadore $note ,Itinerario $notes){
  $prestadores = Prestadore::all();
  $paquetes = Paquete::all();
  $turistas = Turista::all();
  $foto = Foto::all();
  $request->user()->authorizeRoles(['prestador']);
  return view('prestadorItinerarioEditar', compact('note','notes', 'prestadores', 'paquetes', 'turistas'), ['fotos' => $foto]);
}

public function eliminarItinerario(Request $request , Prestadore $note, Itinerario $notes){

  $foto = Foto::all();
  $request->user()->authorizeRoles(['prestador']);
  return view('prestadorItinerarioEliminar', compact('note', 'notes'), ['fotos' => $foto]);
}

public function borrarItinerario(Itinerario $note){
  $note->delete();
  return redirect ('/Itinerario');
}

public function Itinerariosuspender(Request $request, Prestadore $note)
{
    $foto = Foto::all();
    $suspe = \Auth::user()->itinerarios()->onlyTrashed()->get();

    $request->user()->authorizeRoles(['prestador']);

    return view("prestadorItinerarioSuspender", compact('note'),['itinerarios' => $suspe, 'fotos' => $foto]);
}


public function suspenderItinerario(Request $request, $id){
  $request->user()->authorizeRoles(['prestador']);
  $prueba= Itinerario::onlyTrashed()->where('id', $id)->restore();
  return redirect ('/Itinerario/suspender');
}

public function deleteItinerario(Request $request, $id){
  $request->user()->authorizeRoles(['prestador']);
  $prueba= Itinerario::onlyTrashed()->where('id', $id)->forceDelete();
  return redirect ('/Itinerario/suspender');
}

public function zonas(Request $request)
{
  $foto = Foto::all();
  $notes = Zona::all();
  return view("listaz", ['zonas' => $notes], ['fotos' => $foto]);

}

public function infozona1(Request $request , Zona $note)
{
    $foto = Foto::all();
    return view("zone1", compact('note'), ['fotos' => $foto]);
}


public function quienes(Request $request)
{
    $foto = Foto::all();
    return view("nosotros", ['fotos' => $foto]);
}


public function ListaAtractivo(Request $request)
{
  $foto = Foto::all();
  $notes = Atractivo::all();
  $zona = Zona::all();
  return view("listaAtractivo", ['atractivos' => $notes,  'zonas' => $zona, 'fotos' => $foto]);

}

public function Atractivo(Request $request , Atractivo $note)
{
    $foto = Foto::all();
    $zona = Zona::all();
    return view("Atractivos", compact('note'), ['fotos' => $foto, 'zonas' => $zona]);
}




/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show(Request $request)
{
    return view("mostrar");
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    //
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    //
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    //
}
}
