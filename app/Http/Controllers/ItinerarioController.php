<?php

namespace App\Http\Controllers;

use App\Itinerario;
use App\Prestadore;
use App\Package;
use App\Turista;
use Illuminate\Http\Request;

class ItinerarioController extends Controller
{
  public function index()
  {
      $itinerarios = Itinerario::paginate();

      return view('itinerarios.index', compact('itinerarios'));
  }

  public function create()
  {
      $prestadores = Prestadore::all();
      $paquetes = Package::all();
      $turistas = Turista::all();
      return view('itinerarios.create', compact('prestadores', 'paquetes', 'turistas'));
  }

  public function store(Request $request)
  {
      $itinerario = Itinerario::create($request->all());

      return redirect()->route('itinerarios.index')
        ->with('info', 'Itinerario creado con exito');
  }

  public function show(Request $request ,Itinerario $itinerario)
  {
      return view('itinerarios.show', compact ('itinerario'));
  }

  public function edit(Itinerario $itinerario)
  {
      $prestadores = Prestadore::all();
      $paquetes = Package::all();
      $turistas = Turista::all();
      return view('itinerarios.edit', compact ('itinerario', 'prestadores', 'paquetes', 'turistas'));
  }

  public function update(Request $request, Itinerario $itinerario)
  {
      $itinerario->update($request->all());

      return redirect()->route('itinerarios.index')
        ->with('info', 'Itinerario actualizado con exito');
  }

  public function destroy(Itinerario $itinerario)
  {
      $itinerario->delete();

      return back()->with('info', 'Eliminado correctamente');
  }

  public function invoice()
  {

      $itinerarios = $this->getitinerarios();
      $date = date('Y-m-d');
      $invoice = "2222";
      $view =  \View::make('pdf.itinerarios', compact('itinerarios', 'date', 'invoice'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('invoice');
      //return $pdf->download('invoice'); //para descargar
  }

  public function getitinerarios()
  {
      $itinerarios = Itinerario::all();

      return $itinerarios;
  }
}
