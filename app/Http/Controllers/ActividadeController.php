<?php

namespace App\Http\Controllers;

use App\Actividade;
use Illuminate\Http\Request;

class ActividadeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $actividades = Actividade::paginate();

      return view('actividades.index', compact('actividades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('actividades.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $actividade = Actividade::create($request->all());

      return redirect()->route('actividades.index')
        ->with('info', 'Actividad creada con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Actividade  $actividade
   * @return \Illuminate\Http\Response
   */
  public function show(Actividade $actividade)
  {
      return view('actividades.show', compact ('actividade'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Actividade  $actividade
   * @return \Illuminate\Http\Response
   */
  public function edit(Actividade $actividade)
  {
      return view('actividades.edit', compact ('actividade'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Actividade  $actividade
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Actividade $actividade)
  {
      $actividade->update($request->all());

      return redirect()->route('actividades.index')
        ->with('info', 'Actividad actualizada con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Actividade  $actividade
   * @return \Illuminate\Http\Response
   */
  public function destroy(Actividade $actividade)
  {
      $actividade->delete();

      return back()->with('info', 'Eliminado correctamente');
  }
  }
