<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{

  public function index()
  {
      $contactos = Contacto::paginate();

      return view('contactos.index', compact('contactos'));
  }

  public function create()
  {
      return view('contactos.create');
  }

  public function store(Request $request)
  {
      $contacto = Contacto::create($request->all());

      return redirect()->route('contactos.index')
        ->with('info', 'Contacto creado con exito');
  }

  public function show(Contacto $contacto)
  {
      return view('contactos.show', compact ('contacto'));
  }

  public function edit(Contacto $contacto)
  {
      return view('contactos.edit', compact ('contacto'));
  }

  public function update(Request $request, Contacto $contacto)
  {
      $contacto->update($request->all());

      return redirect()->route('contactos.index')
        ->with('info', 'Contacto actualizado con exito');
  }

  public function destroy(Contacto $contacto)
  {
      $contacto->delete();

      return back()->with('info', 'Eliminado correctamente');
  }
}
