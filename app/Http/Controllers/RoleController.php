<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->all());

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.index')
          ->with('info', 'Role guardado con exito');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', compact ('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::get();

        return view('roles.edit', compact ('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //Actualice role

        $role->update($request->all());

        //Actualizar permisos

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.index')
          ->with('info', 'Role actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
