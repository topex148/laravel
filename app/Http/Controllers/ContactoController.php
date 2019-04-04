<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Input;
use Image;
use Mail;


class ContactoController extends Controller
{

  public function index()
  {
      $contactos = Contacto::paginate();

      return view('contactos.index', compact('contactos'));
  }

  public function create(Request $request)
  {
      $contacto = Contacto::all();
      return view('contactos.create',['contactos' => $contacto]);
  }

  public function store(Request $request)
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
          $msj->from("meriventura.c.a@gmail.com","Meriventura");
          $msj->subject($subject);
          $msj->to($for);
      });

      //$contacto = Contacto::create($request->all());

      return redirect()->route('contactos.index')
        ->with('info', 'Contacto creado con exito');
  }

  public function show(Contacto $contacto)
  {
      return view('contactos.show', compact ('contacto'));
  }

  public function edit(Contacto $contacto)
  {
      return view('contactos.edit', compact ('contacto'));
  }

  public function update(Request $request, $id)
  {

    if($request->hasFile('archivo'))
{
  Storage::delete('imagen/contactar/'.$contacto->archivo);

  $fileNameExt = $request->file('archivo')->getClientOriginalName();
  $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
  $fileExt = $request->file('archivo')->getClientOriginalExtension();
  $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
  $pathToStore = $request->file('archivo')->storeAs('imagen/contactar/',$fileNameToStore);
}

$post = Contacto::find($id);
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

    //  $contacto->update($request->all());

      return redirect()->route('contactos.index')
        ->with('info', 'Contacto actualizado con exito');
  }

  public function destroy(Contacto $contacto)
  {
      Storage::delete('imagen/contactar/'.$contacto->archivo);
      $contacto->delete();

      return back()->with('info', 'Eliminado correctamente');
  }
}
