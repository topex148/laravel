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
use App\Package;
use App\Foto;
use App\Zona;
use App\Atractivo;
use App\Plane;
use App\Registro;
use App\Imagene;
use App\Contacto;
use Mail;

class ControladorPrincipal extends Controller
{
  public function inicio()
  {
    $foto = Foto::all();
    $actividad = Actividade::all();
    $contacto = Contacto::all();
    return view("PaginasIniciales/inicio", ['contactos' => $contacto, 'fotos' => $foto, 'actividades' => $actividad]);
  }

  public function inicioContactoGuardar(Request $request)
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

      //$contacto = Contacto::create($request->all());

      return redirect ('/inicio')
        ->with('info', 'Mensaje enviado con exito');
  }

  public function nosotros()
  {
    $foto = Foto::all();
    return view("PaginasIniciales/nosotros", ['fotos' => $foto]);
  }

  public function atractivoLista(Request $request)
  {
    $foto = Foto::all();
    $atractivo = Atractivo::all();
    $zona = Zona::all();
    return view("PaginasIniciales/atractivoLista", ['fotos' => $foto, 'zonas' => $zona, 'atractivos' => $atractivo]);
  }

  public function atractivo(Request $request , Atractivo $atractivo)
  {
    $foto = Foto::all();
    $zona = Zona::all();
    return view("PaginasIniciales/atractivo", compact('atractivo'), ['fotos' => $foto, 'zonas' => $zona]);
  }

  public function zonaLista(Request $request)
  {
    $foto = Foto::all();
    $zona = Zona::all();
    return view("PaginasIniciales/zonaLista", ['fotos' => $foto, 'zonas' => $zona]);
  }

  public function zona(Request $request , Zona $zona)
  {
    $foto = Foto::all();
    return view("PaginasIniciales/zona", compact('zona'), ['fotos' => $foto]);
  }

  public function actividadLista()
  {
    $foto = Foto::all();
    $prestadore = Prestadore::all();
    $actividad = Actividade::all();
    return view("PaginasIniciales/actividadLista", ['prestadores' => $prestadore, 'fotos' => $foto, 'actividades' => $actividad]);
  }

  public function actividad()
  {
    $foto = Foto::all();
    return view("PaginasIniciales/actividad", ['fotos' => $foto]);
  }

  public function servicioLista(Request $request)
  {
    $foto = Foto::all();
    $prestadore = Prestadore::all();
    return view("PaginasIniciales/servicioLista", ['prestadores' => $prestadore, 'fotos' => $foto]);
  }

  public function servicio(Request $request , Prestadore $prestadore)
  {
    $foto = Foto::all();
    return view("PaginasIniciales/servicio", compact('prestadore'), ['fotos' => $foto]);
  }

  public function contacto()
  {
    $foto = Foto::all();
    $contacto = Contacto::all();
    return view("PaginasIniciales/contacto", ['fotos' => $foto, 'contactos' => $contacto]);
  }

  public function contactoGuardar(Request $request)
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

      //$contacto = Contacto::create($request->all());

      return redirect ('/contacto')
        ->with('info', 'Mensaje enviado con exito');
  }

  public function galeria()
  {
    $foto = Foto::all();
    return view("PaginasIniciales/galeria", ['fotos' => $foto]);
  }

}
