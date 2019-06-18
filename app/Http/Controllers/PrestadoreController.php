<?php

namespace App\Http\Controllers;

use App\Prestadore;
use App\Itinerario;
use App\Foto;
use Storage;
use App\planillaRegistro;
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





  public function show(Prestadore $prestadore)
  {
      return view('prestadores.show', compact ('prestadore'));
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

    public function home()
    {

        $contactos = planillaRegistro::all();

        return view('planillas.home', compact('contactos'));
    }

    public function ver(planillaRegistro $contacto)
    {
        return view('planillas.show', compact ('contacto'));
    }

    public function descarga(planillaRegistro $contacto){
      $dato = $contacto->imagen;
      $path = public_path('storage/pdf/prestador/'. $dato);
      return response()->download($path);

    }

    public function eliminar(planillaRegistro $contacto)
    {
        Storage::delete('pdf/prestador/'.$contacto->imagen);
        $contacto->delete();

        return back()->with('info', 'Eliminado correctamente');
    }

}
