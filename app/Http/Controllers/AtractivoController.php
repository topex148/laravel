<?php

namespace App\Http\Controllers;

use App\Prestadore;
use App\Actividade;
use Auth;
use App\Atractivo;
use App\Zona;
use App\Foto;
use Illuminate\Http\Request;

class AtractivoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $atractivos = Atractivo::paginate();
      $fotos = Foto::all();

      return view('atractivos.index', compact('atractivos', 'fotos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $zonas = Zona::all();
      return view('atractivos.create',  compact('zonas'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $atractivo = Atractivo::create($request->all());

      return redirect()->route('atractivos.index')
        ->with('info', 'Atractivo creado con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Atractivo  $atractivo
   * @return \Illuminate\Http\Response
   */
  public function show(Atractivo $atractivo)
  {
      return view('atractivos.show', compact ('atractivo'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Atractivo  $atractivo
   * @return \Illuminate\Http\Response
   */
  public function edit(Request $request , Atractivo $atractivo)
  {
      $zonas = Zona::all();
      return view('atractivos.edit', compact ('atractivo', 'zonas'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Atractivo  $atractivo
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Atractivo $atractivo)
  {
      $atractivo->update($request->all());

      return redirect()->route('atractivos.index')
        ->with('info', 'Atractivo actualizado con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Atractivo  $atractivo
   * @return \Illuminate\Http\Response
   */
  public function destroy(Atractivo $atractivo)
  {
      $atractivo->delete();

      return back()->with('info', 'Eliminado correctamente');
  }


  //Foto Atractivo

  public function createAtractivo()
  {
    $prestadores = Prestadore::all();
    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();
    $fotos = Foto::all();
    return view('fotosAtractivos.create', compact('prestadores', 'zonas', 'atractivos', 'fotos', 'actividades'));
  }

  public function storeAtractivo(Request $request)
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
        $post->id_Atrac = request()->id_Atrac;
        $post->user_id = \Auth::user()->id;

        $post->save();
      //$foto = Foto::create($request->all());

      return redirect()->route('atractivos.index')
        ->with('info', 'Foto creada con exito');
  }

  public function showAtractivo(Foto $foto)
  {
      return view('fotosAtractivos.show', compact ('foto'));
  }

  public function editAtractivo(Foto $foto)
  {
    $prestadores = Prestadore::all();
    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();

      return view('fotosAtractivos.edit', compact ('foto', 'prestadores', 'zonas', 'atractivos', 'actividades'));
  }

  public function updateAtractivo(Request $request,  $id)
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
                  $post->id_Atrac = request()->id_Atrac;

                  $post->save();

      //$foto->update($request->all());

      return redirect()->route('atractivos.index')
        ->with('info', 'Foto actualizada con exito');
  }

  public function destroyAtractivo(Foto $foto)
  {
      $foto->delete();

      return back()->with('info', 'Eliminado correctamente');
  }

}
