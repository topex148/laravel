<?php

namespace App\Http\Controllers;

use App\Plane;
use Illuminate\Http\Request;

class PlaneController extends Controller
{
  public function index()
  {
      $planes = Plane::paginate();

      return view('planes.index', compact('planes'));
  }

  public function create()
  {
      return view('planes.create');
  }

  public function store(Request $request)
  {
      $plane = Plane::create($request->all());

      return redirect()->route('planes.index')
        ->with('info', 'Plan creado con exito');
  }

  public function show(Plane $plane)
  {
      return view('planes.show', compact ('plane'));
  }

  public function edit(Plane $plane)
  {
      return view('planes.edit', compact ('plane'));
  }

  public function update(Request $request, Plane $plane)
  {
      $plane->update($request->all());

      return redirect()->route('planes.index')
        ->with('info', 'Plan actualizado con exito');
  }

  public function destroy(Plane $plane)
  {
      $plane->delete();

      return back()->with('info', 'Eliminado correctamente');
  }
}
