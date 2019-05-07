<?php

namespace App\Http\Controllers;

use App\Turista;
use Illuminate\Http\Request;

class TuristaController extends Controller
{
  public function index()
  {
      $turistas = Turista::paginate();

      return view('turistas.index', compact('turistas'));
  }

  public function create()
  {
      return view('turistas.create');
  }

  public function store(Request $request)
  {
      $turista = Turista::create($request->all());

      return redirect()->route('turistas.index')
        ->with('info', 'Turista creado con exito');
  }

  public function show(Turista $turista)
  {
      return view('turistas.show', compact ('turista'));
  }

  public function edit(Turista $turista)
  {
      return view('turistas.edit', compact ('turista'));
  }

  public function update(Request $request, Turista $turista)
  {
      $turista->update($request->all());

      return redirect()->route('turistas.index')
        ->with('info', 'Turista actualizado con exito');
  }

  public function destroy(Turista $turista)
  {
      $turista->delete();

      return back()->with('info', 'Eliminado correctamente');
  }

  public function invoice()
  {

      $turistas = $this->getturistas();
      $date = date('Y-m-d');
      $invoice = "2222";
      $view =  \View::make('pdf.turistas', compact('turistas', 'date', 'invoice'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('invoice');
      //return $pdf->download('invoice'); //para descargar
  }

  public function getturistas()
  {
      $turistas = Turista::all();

      return $turistas;
  }
}
