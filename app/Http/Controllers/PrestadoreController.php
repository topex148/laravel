<?php

namespace App\Http\Controllers;

use App\Prestadore;
use App\Foto;
use Illuminate\Http\Request;

class PrestadoreController extends Controller
{
  public function index()
  {
      $fotos = Foto::paginate();
      $itinerarios = Itinerario::paginate();


      return view('prestadores.index', compact('prestadores', 'fotos'));
  }

  public function create()
  {
      $prestadore = Prestadore::all();
      return view('prestadores.create',['prestadores' => $prestadore]);
  }

  public function store(Request $request)
  {
    if($request->hasFile('imagen'))
      {


          $fileNameExt = $request->file('imagen')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen')->storeAs('imagen/prestador/',$fileNameToStore);
      }

      $post = new Prestadore;
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

    //  $prestadore = Prestadore::create($request->all());

      return redirect()->route('prestadores.index')
        ->with('info', 'Prestador creado con exito');
  }

  public function show(Prestadore $prestadore)
  {
      return view('prestadores.show', compact ('prestadore'));
  }

  public function edit(Prestadore $prestadore)
  {
      return view('prestadores.edit', compact ('prestadore'));
  }

  public function update(Request $request, $RIF)
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
      //$prestadore->update($request->all());

      return redirect()->route('prestadores.index')
        ->with('info', 'Prestador actualizado con exito');
  }

  public function destroy(Prestadore $prestadore)
  {
      $prestadore->delete();

      return back()->with('info', 'Eliminado correctamente');
  }
}
