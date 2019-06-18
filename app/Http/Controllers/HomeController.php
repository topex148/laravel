<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestadore;
use App\Itinerario;
use App\Foto;
use App\Turista;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Mail;
use App\Mail\NewUserWelcome;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function email()
    {

        Mail::to(Auth::user()->email)->send(new NewUserWelcome());

        return redirect('home');
    }

    public function registro()
    {
      $prestadore = Prestadore::all();
      $suspendido = Prestadore::onlyTrashed()->get();
      $turistas = Turista::all();
      foreach($turistas as $turista){
        if (($turista->userId) == (Auth::user()->id)){
          return view('registro.error');
        }
      }

      foreach($prestadore as $prestador){
        if (($prestador->userId) == (Auth::user()->id)){
          return view('registro.error');
        }
      }

      foreach($suspendido as $suspendid){
        if (($suspendid->userId) == (Auth::user()->id)){
          return view('registro.error');
        }
      }

        return view('registrar');
    }

    public function registroPrestador()
    {
        $prestadore = Prestadore::all();
        $suspendido = Prestadore::onlyTrashed()->get();
        $turistas = Turista::all();
        foreach($turistas as $turista){
          if (($turista->userId) == (Auth::user()->id)){
            return view('registro.error');
          }
        }

        foreach($prestadore as $prestador){
          if (($prestador->userId) == (Auth::user()->id)){
            return view('registro.error');
          }
        }

          foreach($suspendido as $suspendid){
            if (($suspendid->userId) == (Auth::user()->id)){
              return view('registro.error');
            }
        }

        return view('registro.prestador',['prestadores' => $prestadore]);
    }

    public function storePrestador(Request $request)
    {

      $usuario = \Auth::user()->id;
      $user = User::find($usuario);
      $roles = Role::find(2);

      if($request->hasFile('imagen'))
        {


            $fileNameExt = $request->file('imagen')->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $fileExt = $request->file('imagen')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = $request->file('imagen')->storeAs('imagen/prestador/',$fileNameToStore);
        }

        $post = new Prestadore;
        if($request->hasFile('imagen')){
                    $post->imagen = $fileNameToStore;
                }
        $post->RIF = request()->RIF;
        $post->Telefono = request()->Telefono;
        $post->RTN = request()->RTN;
        $post->Nombre = request()->Nombre;
        $post->DescripcionServicio = request()->DescripcionServicio;
        $post->DescripcionPrestador = request()->DescripcionPrestador;
        $post->DescripcionActividad = request()->DescripcionActividad;
        $post->Facebook = request()->Facebook;
        $post->Twitter = request()->Twitter;
        $post->Instagram = request()->Instagram;
        $post->userId = \Auth::user()->id;

        $post->save();
        $post->delete();
        $user->roles()->sync($roles);


      //  $prestadore = Prestadore::create($request->all());

        return redirect()->route('home')
          ->with('info', 'Prestador creado con exito');
    }

    public function registroTurista()
    {
        $prestadore = Prestadore::all();
        $turistas = Turista::all();
        $suspendido = Prestadore::onlyTrashed()->get();
        foreach($turistas as $turista){
          if (($turista->userId) == (Auth::user()->id)){
            return view('registro.error');
          }
        }

        foreach($prestadore as $prestador){
          if (($prestador->userId) == (Auth::user()->id)){
            return view('registro.error');
          }
        }

        foreach($suspendido as $suspendid){
          if (($suspendid->userId) == (Auth::user()->id)){
            return view('registro.error');
          }
        }

        return view('registro.turista');


    }

    public function storeTurista(Request $request)
    {
      $usuario = \Auth::user()->id;
      $user = User::find($usuario);
      $roles = Role::find(3);

      $post = new Turista;

      $post->edad = request()->edad;
      $post->genero = request()->genero;
      $post->Estado_P = request()->Estado_P;
      $post->Pais_P= request()->Pais_P;
      $post->userId = \Auth::user()->id;

      $post->save();

      $user->roles()->sync($roles);


        return redirect()->route('inicio')
          ->with('info', 'Turista creado con exito');
    }


}
