<?php

namespace App\Http\Controllers;

use App\Itinerario;
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
      return view('itinerarios.create');
  }

  public function store(Request $request)
  {
      $itinerario = Itinerario::create($request->all());

      return redirect()->route('itinerarios.index')
        ->with('info', 'Itinerario creado con exito');
  }

  public function show(Itinerario $itinerario)
  {
      return view('itinerarios.show', compact ('itinerario'));
  }

  public function edit(Itinerario $itinerario)
  {
      return view('itinerarios.edit', compact ('itinerario'));
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
}
