<?php

namespace App\Http\Controllers;

use App\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
  public function index()
  {
      $zonas = Zona::paginate();

      return view('zonas.index', compact('zonas'));
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
}
