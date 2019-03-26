<?php

namespace App\Http\Controllers;

use App\Atractivo;
use App\Zona;
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

      return view('atractivos.index', compact('atractivos'));
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
}
