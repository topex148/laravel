<?php

namespace App\Http\Controllers;

use App\Prestadore;
use Illuminate\Http\Request;

class PrestadoreController extends Controller
{
  public function index()
  {
      $prestadores = Prestadore::paginate();

      return view('prestadores.index', compact('prestadores'));
  }

  public function create()
  {
      return view('prestadores.create');
  }

  public function store(Request $request)
  {
      $prestadore = Prestadore::create($request->all());

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

  public function update(Request $request, Prestadore $prestadore)
  {
      $prestadore->update($request->all());

      return redirect()->route('prestadores.index')
        ->with('info', 'Prestador actualizado con exito');
  }

  public function destroy(Prestadore $prestadore)
  {
      $prestadore->delete();

      return back()->with('info', 'Eliminado correctamente');
  }
}
