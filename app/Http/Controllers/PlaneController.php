<?php

namespace App\Http\Controllers;

use App\Plane;
use Storage;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
  public function index()
  {
      $planes = Plane::paginate();

      return view('planes.index', compact('planes'));
  }

  public function create()
  {
      return view('planes.create');
  }

  public function store(Request $request)
  {

    if($request->hasFile('imagen'))
      {


          $fileNameExt = $request->file('imagen')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen')->storeAs('imagen/plan/',$fileNameToStore);
      }

      $post = new Plane;
      if($request->hasFile('imagen')){
                  $post->imagen = $fileNameToStore;
              }
      $post->name = request()->name;
      $post->descripcion = request()->descripcion;
      $post->precio = request()->precio;
      $post->Publicidad = request()->Publicidad;
      $post->Fecha_Inicio = request()->Fecha_Inicio;
      $post->Fecha_Final = request()->Fecha_Final;

      $post->save();

    //  $prestadore = Prestadore::create($request->all());

      //$plane = Plane::create($request->all());

      return redirect()->route('planes.index')
        ->with('info', 'Plan creado con exito');
  }

  public function show(Plane $plane)
  {
      return view('planes.show', compact ('plane'));
  }

  public function edit(Plane $plane)
  {
      return view('planes.edit', compact ('plane'));
  }

  public function update(Request $request, $id)
  {

    $post = Plane::find($id);

    if($request->hasFile('imagen'))
      {
          Storage::delete('imagen/plan/'.$post->imagen);

          $fileNameExt = $request->file('imagen')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen')->storeAs('imagen/plan',$fileNameToStore);
      }


      if($request->hasFile('imagen')){
                  $post->imagen = $fileNameToStore;
              }
      $post->name = request()->name;
      $post->descripcion = request()->descripcion;
      $post->precio = request()->precio;
      $post->Fecha_Inicio = request()->Fecha_Inicio;
      $post->Fecha_Final = request()->Fecha_Final;
      $post->Publicidad = request()->Publicidad;

      $post->save();
      //$plane->update($request->all());

      return redirect()->route('planes.index')
        ->with('info', 'Plan actualizado con exito');
  }

  public function destroy(Plane $plane)
  {
      Storage::delete('imagen/plan/'.$plane->imagen);
      $plane->delete();

      return back()->with('info', 'Eliminado correctamente');
  }

  public function invoice()
  {

      $planes = $this->getplanes();
      $date = date('Y-m-d');
      $invoice = "2222";
      $view =  \View::make('pdf.planes', compact('planes', 'date', 'invoice'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('invoice');
      //return $pdf->download('invoice'); //para descargar
  }

  public function getplanes()
  {
      $planes = Plane::all();

      return $planes;
  }
}
