<?php

namespace App\Http\Controllers;

use App\User;
use App\Foto;
use App\Prestadore;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\User  $product
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact ('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $prestadores = Prestadore::all();
        $roles = Role::get();
        return view('users.edit', compact ('user', 'roles', 'prestadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Actualice el usuario

        $user->update($request->all());

        //Actualizar $roles

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index')
          ->with('info', 'Usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('info', 'Eliminado correctamente');
    }

    public function invoice()
    {

        $users = $this->getuser();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.users', compact('users', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
        //return $pdf->download('invoice'); //para descargar
    }

    public function getuser()
    {
        $users = User::all();

        return $users;
    }
}
