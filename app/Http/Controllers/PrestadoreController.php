<?php

namespace App\Http\Controllers;

use App\Prestadore;
use App\Itinerario;
use App\Foto;
use Storage;
use Illuminate\Http\Request;

class PrestadoreController extends Controller
{
  public function index()
  {
      $fotos = Foto::paginate();
      $prestadores = Prestadore::all();
      $itinerarios = Itinerario::all();


      return view('prestadores.index', compact('prestadores', 'fotos', 'itinerarios'));
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
      $post->DescripcionActividad = request()->DescripcionActividad;
      $post->Facebook = request()->Facebook;
      $post->Twitter = request()->Twitter;
      $post->Instagram = request()->Instagram;
      $post->Fecha_Final = request()->Fecha_Final;

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
    $post = Prestadore::find($RIF);

    if($request->hasFile('imagen'))
      {
          Storage::delete('imagen/prestador/'.$post->imagen);

          $fileNameExt = $request->file('imagen')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen')->storeAs('imagen/prestador',$fileNameToStore);
      }


      if($request->hasFile('imagen')){
                  $post->imagen = $fileNameToStore;
              }
      $post->RIF = request()->RIF;
      $post->Telefono = request()->Telefono;
      $post->RTN = request()->RTN;
      $post->Nombre = request()->Nombre;
      $post->DescripcionServicio = request()->DescripcionServicio;
      $post->DescripcionPrestador = request()->DescripcionPrestador;
      $post->DescripcionActividad = request()->DescripcionActividad;
      $post->Facebook = request()->Facebook;
      $post->Twitter = request()->Twitter;
      $post->Instagram = request()->Instagram;
      $post->Fecha_Final = request()->Fecha_Final;

      $post->save();
      //$prestadore->update($request->all());

      return redirect()->route('prestadores.index')
        ->with('info', 'Prestador actualizado con exito');
  }

  public function destroy(Prestadore $prestadore)
  {
      Storage::delete('imagen/prestador/'.$prestadore->imagen);
      $prestadore->delete();

      return back()->with('info', 'Eliminado correctamente');
  }

  public function invoice()
  {

      $prestadores = $this->getprestador();
      $date = date('Y-m-d');
      $invoice = "2222";
      $view =  \View::make('pdf.prestadores', compact('prestadores', 'date', 'invoice'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('prestadores.pdf');
      //return $pdf->download('invoice'); //para descargar
  }

  public function invoiceDownload()
  {

      $prestadores = $this->getprestador();
      $date = date('Y-m-d');
      $invoice = "2222";
      $view =  \View::make('pdf.prestadores', compact('prestadores', 'date', 'invoice'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->download('prestadores.pdf');
      //return $pdf->download('invoice'); //para descargar
  }

  public function getprestador()
  {
      $prestadores = Prestadore::all();

      return $prestadores;
  }

  public function suspender(Prestadore $suspen)
  {

    $suspen = Prestadore::onlyTrashed()->get();

    return view('prestadores.suspender',['prestadores' => $suspen]);
  }


  public function restaurar($RIF){
      $prueba= Prestadore::onlyTrashed()->where('RIF', $RIF)->restore();
      return redirect ('/prestadores/suspender');
    }

  public function delete($RIF){

      //$pruebas= Publicidade::onlyTrashed()->where('id', $id);
      //Storage::delete('imagen/publicidad/'.$pruebas->imagen);
      $prueba= Prestadore::onlyTrashed()->where('RIF', $RIF)->forceDelete();

      return redirect ('/prestadores/suspender');
    }


}
