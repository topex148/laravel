<?php

namespace App\Http\Controllers;

use App\Turista;
use App\User;
use Illuminate\Http\Request;

class TuristaController extends Controller
{
  public function index()
  {
      $turistas = Turista::paginate();
      $usuarios = User::all();

      return view('turistas.index', compact('turistas', 'usuarios'));
  }


  public function show(Turista $turista)
  {
      return view('turistas.show', compact ('turista'));
  }


  public function destroy(Turista $turista)
  {
      $turista->delete();

      return back()->with('info', 'Eliminado correctamente');
  }

  public function invoice()
  {

      $turistas = $this->getturistas();
      $usuarios = $this->getusuarios();
      $date = date('Y-m-d');
      $view =  \View::make('pdf.turistas', compact('turistas', 'usuarios', 'date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('turistas.pdf');
      //return $pdf->download('invoice'); //para descargar
  }

  public function invoiceDownload()
  {

      $turistas = $this->getturistas();
      $usuarios = $this->getusuarios();
      $date = date('Y-m-d');
      $view =  \View::make('pdf.turistas', compact('turistas','usuarios', 'date'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->download('turistas.pdf');
      //return $pdf->download('invoice'); //para descargar
  }


  public function getturistas()
  {
      $turistas = Turista::all();

      return $turistas;
  }

  public function getusuarios()
  {
      $usuarios = User::all();

      return $usuarios;
  }


}
