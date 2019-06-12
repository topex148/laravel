<?php

namespace App\Http\Controllers;

use App\Publicidade;
use App\Prestadore;
use File;
use Storage;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PublicidadController extends Controller
{
  public function index(Publicidade $publicidade)
  {
      $now = Carbon::now();
      $publicidade = Publicidade::paginate();

      return view('publicidad.index', compact('publicidade', 'now'));
  }

  public function create()
  {
    $publicidade = Publicidade::all();
    $prestadores = Prestadore::all();
    return view('publicidad.create', compact( 'publicidade', 'prestadores'));
  }

  public function store(Request $request)
  {
    $now = Carbon::now();
    $post = new Publicidade;

    if($request->hasFile('imagen'))
      {
          $fileNameExt = $request->file('imagen')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen')->storeAs('imagen/publicidad/',$fileNameToStore);
      }


      if($request->hasFile('imagen')){
                  $post->imagen = $fileNameToStore;
              }

        $post->title = request()->title;
        $post->Fecha_Final = request()->Fecha_Final;
        $post->RIF_Prest = request()->RIF_Prest;

        $post->save();

        return redirect()->route('publicidad.index')
            ->with('info', 'Publicidad creada con exito');

  }

  public function show(Publicidade $publicidad)
  {
      $prestadores = Prestadore::all();
      return view('publicidad.show', compact ('publicidad', 'prestadores'));
  }

  public function edit(Publicidade $publicidad)
  {
      $prestadores = Prestadore::all();
      return view('publicidad.edit', compact ('publicidad', 'prestadores'));
  }

  public function update(Request $request,  $id)
  {
    $post = Publicidade::find($id);

    if($request->hasFile('imagen'))
          {
              Storage::delete('imagen/publicidad/'.$post->imagen);

              $fileNameExt = $request->file('imagen')->getClientOriginalName();
              $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
              $fileExt = $request->file('imagen')->getClientOriginalExtension();
              $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
              $pathToStore = $request->file('imagen')->storeAs('imagen/publicidad',$fileNameToStore);
          }


          if($request->hasFile('imagen')){
                      $post->imagen = $fileNameToStore;
                  }

                  $post->title = request()->title;
                  $post->Fecha_Final = request()->Fecha_Final;
                  $post->RIF_Prest = request()->RIF_Prest;

                  $post->save();

      return redirect()->route('publicidad.index')
        ->with('info', 'Publicidad actualizada con exito');
  }

  public function destroy(Publicidade $publicidad)
  {

      //Storage::delete('imagen/publicidad/'.$publicidad->imagen);
      $publicidad->delete();

      return back()->with('info', 'Eliminado correctamente');
  }

  public function suspender(Publicidade $suspen)
  {

    $suspen = Publicidade::onlyTrashed()->get();

    return view('publicidad.suspender',['publicidades' => $suspen]);
  }


  public function restaurar($id){
      $prueba= Publicidade::onlyTrashed()->where('id', $id)->restore();
      return redirect ('/publicidad/suspender');
    }

  public function delete($id){

      //$pruebas= Publicidade::onlyTrashed()->where('id', $id);
      //Storage::delete('imagen/publicidad/'.$pruebas->imagen);
      $prueba= Publicidade::onlyTrashed()->where('id', $id)->forceDelete();

      return redirect ('/publicidad/suspender');
    }

}
