<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Prestadore;
use App\Atractivo;
use App\Zona;
use App\Actividade;
use File;
use Storage;
use Auth;
use Illuminate\Http\Request;

class FotoController extends Controller
{
  public function index(Foto $foto)
  {
      $fotos = Foto::paginate();
    //$fotos = \Auth::user()->fotos()->get();
    //$fotos = $foto->fotos()->where('user_id', \Auth::user()->id)->get();

      return view('fotos.index', compact('fotos'));
  }

  public function create()
  {

    $prestadores = Prestadore::all();
    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();
    $fotos = Foto::all();


    return view('fotos.create', compact('prestadores', 'zonas', 'atractivos', 'fotos', 'actividades'));
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

        $post->Galeria = request()->Galeria;
        $post->title = request()->title;
        $post->descripcion = request()->descripcion;
        $post->id_Zona = request()->id_Zona;
        $post->id_Atrac = request()->id_Atrac;
        $post->id_Activi = request()->id_Activi;
        $post->user_id = \Auth::user()->id;

        $post->save();
      //$foto = Foto::create($request->all());

      return redirect()->route('fotos.index')
        ->with('info', 'Foto creada con exito');
  }

  public function show(Foto $foto)
  {
      return view('fotos.show', compact ('foto'));
  }

  public function edit(Foto $foto)
  {
    $prestadores = Prestadore::all();
    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();

      return view('fotos.edit', compact ('foto', 'prestadores', 'zonas', 'atractivos', 'actividades'));
  }

  public function update(Request $request,  $id)
  {
    $post = Foto::find($id);

    if($request->hasFile('imagen'))
          {
              Storage::delete('imagen/foto/'.$post->imagen);

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

                  $post->save();

      //$foto->update($request->all());

      return redirect()->route('fotos.index')
        ->with('info', 'Foto actualizada con exito');
  }

  public function destroy(Foto $foto)
  {

      Storage::delete('imagen/foto/'.$foto->imagen);
      $foto->delete();

      return back()->with('info', 'Eliminado correctamente');
  }
}
