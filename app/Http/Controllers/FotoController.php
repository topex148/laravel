<?php

namespace App\Http\Controllers;

use App\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
  public function index()
  {
      $fotos = Foto::paginate();

      return view('fotos.index', compact('fotos'));
  }

  public function create()
  {
      return view('fotos.create');
  }

  public function store(Request $request)
  {
      $foto = Foto::create($request->all());

      return redirect()->route('fotos.index')
        ->with('info', 'Foto creada con exito');
  }

  public function show(Foto $foto)
  {
      return view('fotos.show', compact ('foto'));
  }

  public function edit(Foto $foto)
  {
      return view('fotos.edit', compact ('foto'));
  }

  public function update(Request $request, Foto $foto)
  {
      $foto->update($request->all());

      return redirect()->route('fotos.index')
        ->with('info', 'Foto actualizada con exito');
  }

  public function destroy(Foto $foto)
  {
      $foto->delete();

      return back()->with('info', 'Eliminado correctamente');
  }
}
