<?php

namespace App\Http\Controllers;

use App\Prestadore;
use App\Actividade;
use Auth;
use App\Atractivo;
use App\Zona;
use App\Foto;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
  public function index()
  {
      $zonas = Zona::paginate();
      $fotos = Foto::all();

      return view('zonas.index', compact('zonas', 'fotos'));
  }

  public function create()
  {
      return view('zonas.create');
  }

  public function store(Request $request)
  {
      $zona = Zona::create($request->all());

      return redirect()->route('zonas.index')
        ->with('info', 'Zona creada con exito');
  }

  public function show(Zona $zona)
  {
      return view('zonas.show', compact ('zona'));
  }

  public function edit(Zona $zona)
  {
      return view('zonas.edit', compact ('zona'));
  }

  public function update(Request $request, Zona $zona)
  {
      $zona->update($request->all());

      return redirect()->route('zonas.index')
        ->with('info', 'Zona actualizada con exito');
  }

  public function destroy(Zona $zona)
  {
      $zona->delete();

      return back()->with('info', 'Eliminado correctamente');
  }


  //Foto Zona

  public function createZona()
  {
    $prestadores = Prestadore::all();
    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();
    $fotos = Foto::all();
    return view('fotosZonas.create', compact('prestadores', 'zonas', 'atractivos', 'fotos', 'actividades'));
  }

  public function storeZona(Request $request)
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
        $post->id_Zona = request()->id_Zona;
        $post->user_id = \Auth::user()->id;

        $post->save();
      //$foto = Foto::create($request->all());

      return redirect()->route('zonas.index')
        ->with('info', 'Foto creada con exito');
  }

  public function showZona(Foto $foto)
  {
      return view('fotosZonas.show', compact ('foto'));
  }

  public function editZona(Foto $foto)
  {
    $prestadores = Prestadore::all();
    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();

      return view('fotosZonas.edit', compact ('foto', 'prestadores', 'zonas', 'atractivos', 'actividades'));
  }

  public function updateZona(Request $request,  $id)
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
                  $post->id_Zona = request()->id_Zona;

                  $post->save();

      //$foto->update($request->all());

      return redirect()->route('zonas.index')
        ->with('info', 'Foto actualizada con exito');
  }

  public function destroyZona(Foto $foto)
  {
      $foto->delete();

      return back()->with('info', 'Eliminado correctamente');
  }

}
