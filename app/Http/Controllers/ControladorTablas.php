<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Input;
use Image;
use Mail;
use App\Prestadore;
use App\Itinerario;
use App\Turista;
use App\Actividade;
use App\Paquete;
use App\Foto;
use App\Zona;
use App\Atractivo;
use App\Plane;
use App\Registro;
use App\Imagene;
use App\Contacto;



class ControladorTablas extends Controller
{
    //

    public function __construct()
     {
         $this->middleware('auth');
     }



     public function perfil(){
       return view('perfil', array ('user' => Auth::user()));
     }

     public function perfilActualizar(Request $request){

       if($request->hasFile('avatar')){
         $avatar = $request->file('avatar');
         $filename = time() . '.' . $avatar->getClientOriginalExtension();
         Image::make($avatar)->resize(300,300)->save(public_path('uploads/avatars/' . $filename));

         $user = Auth::user();
         $user -> avatar = $filename;
         $user ->save();
       }

       return view('perfil', array ('user' => Auth::user()));
     }

     //INICIO PRESTADOR

    public function prestador(Request $request)
    {

        $notes = Prestadore::all();
        $request->user()->authorizeRoles(['gerente', 'promotor']);

        return view("prestador",['prestadores' => $notes]);
    }

    public function guardarPrestador(Request $request)
    {

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
      $post->Facebook = request()->Facebook;
      $post->Twitter = request()->Twitter;
      $post->Instagram = request()->Instagram;

      $post->save();




        //Prestadore::create($request->all());
        return redirect ('/Prestador');

    }

    public function actualizarPrestador(Request $request,  $RIF){

      if($request->hasFile('imagen'))
      {


          $fileNameExt = $request->file('imagen')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen')->storeAs('imagen/prestador',$fileNameToStore);
      }

      $post = Prestadore::find($RIF);
      if($request->hasFile('imagen')){
                  $post->imagen = $fileNameToStore;
              }
      $post->RIF = request()->RIF;
      $post->Telefono = request()->Telefono;
      $post->RTN = request()->RTN;
      $post->Nombre = request()->Nombre;
      $post->DescripcionServicio = request()->DescripcionServicio;
      $post->DescripcionPrestador = request()->DescripcionPrestador;
      $post->Facebook = request()->Facebook;
      $post->Twitter = request()->Twitter;
      $post->Instagram = request()->Instagram;

      $post->save();


      //$note->update(request()->all());
      return redirect ('/Prestador');
    }

    public function editarPrestador(Request $request , Prestadore $note){

      $request->user()->authorizeRoles(['gerente', 'promotor']);
      return view('listaEditar', compact('note'));
    }

    public function eliminarPrestador(Request $request , Prestadore $note){

      $request->user()->authorizeRoles(['gerente', 'promotor']);
      return view('listaEliminar', compact('note'));
    }

    public function borrarPrestador(Prestadore $note){
      $note->delete();
      return redirect ('/Prestador');
    }

    public function psuspender(Request $request)
    {

        $suspe = Prestadore::onlyTrashed()->get();
        $request->user()->authorizeRoles(['gerente', 'promotor']);

        return view("psuspender",['prestadores' => $suspe]);
    }


    public function suspenderPrestador(Request $request, $RIF){
      $request->user()->authorizeRoles(['gerente', 'promotor']);
      $prueba= Prestadore::onlyTrashed()->where('RIF', $RIF)->restore();
      return redirect ('/Prestador/suspender');
    }

    public function deletePrestador(Request $request, $RIF){
      $request->user()->authorizeRoles(['gerente', 'promotor']);
      $prueba= Prestadore::onlyTrashed()->where('RIF', $RIF)->forceDelete();
      return redirect ('/Prestador/suspender');
    }


    //FINAL PRESTADOR

    //INICIO ITINERARIO

    public function itinerario(Request $request)
    {
        $prestadores = Prestadore::all();
        $turistas = Turista::all();
        $paquetes = Paquete::all();
        $notes =  \Auth::user()->itinerarios()->get();
        $request->user()->authorizeRoles(['prestador']);
        return view("itinerario", ['itinerarios' => $notes], compact('prestadores', 'paquetes', 'turistas'));
    }

    public function guardarItinerario(Request $request)
    {

        $itinerario = new Itinerario(request()->all());
        \Auth::user()->itinerarios()->save($itinerario);

        return redirect ('/Itinerario');
    }

    public function actualizarItinerario(Itinerario $note){
      $note->update(request()->all());
      return redirect ('/Itinerario');
    }

    public function editarItinerario(Request $request , Itinerario $note){
      $prestadores = Prestadore::all();
      $paquetes = Paquete::all();
      $turistas = Turista::all();
      $request->user()->authorizeRoles(['prestador']);
      return view('itinerarioEditar', compact('note', 'prestadores', 'paquetes', 'turistas'));
    }

    public function eliminarItinerario(Request $request , Itinerario $note){

      $request->user()->authorizeRoles(['prestador']);
      return view('itinerarioEliminar', compact('note'));
    }

    public function borrarItinerario(Itinerario $note){
      $note->delete();
      return redirect ('/Itinerario');
    }

    public function isuspender(Request $request)
    {

        $suspe = \Auth::user()->itinerarios()->onlyTrashed()->get();

        $request->user()->authorizeRoles(['prestador']);

        return view("isuspender",['itinerarios' => $suspe]);
    }


    public function suspenderItinerario(Request $request, $id){
      $request->user()->authorizeRoles(['prestador']);
      $prueba= Itinerario::onlyTrashed()->where('id', $id)->restore();
      return redirect ('/Itinerario/suspender');
    }

    public function deleteItinerario(Request $request, $id){
      $request->user()->authorizeRoles(['prestador']);
      $prueba= Itinerario::onlyTrashed()->where('id', $id)->forceDelete();
      return redirect ('/Itinerario/suspender');
    }

    //FINAL ITINERARIO

    //INICIO TURISTA

    public function turista(Request $request)
    {
        $notes = Turista::all();
        $request->user()->authorizeRoles(['user']);
        return view("turista", ['turistas' => $notes]);
    }

    public function guardarTurista(Request $request)
    {

        Turista::create($request->all());

        return redirect ('/Turista');
    }

    public function actualizarTurista(Turista $note){
      $note->update(request()->all());
      return redirect ('/Turista');
    }

    public function editarTurista(Request $request , Turista $note){

      $request->user()->authorizeRoles(['user']);
      return view('turistaEditar', compact('note'));
    }

    public function eliminarTurista(Request $request , Turista $note){

      $request->user()->authorizeRoles(['user']);
      return view('turistaEliminar', compact('note'));
    }

    public function borrarTurista(Turista $note){
      $note->delete();
      return redirect ('/Turista');
    }

    public function tsuspender(Request $request)
    {

      $suspe = Turista::onlyTrashed()->get();
      $request->user()->authorizeRoles(['user']);

        return view("tsuspender",['turistas' => $suspe]);
    }


    public function suspenderTurista(Request $request, $id){
      $request->user()->authorizeRoles(['user']);
      $prueba= Turista::onlyTrashed()->where('id', $id)->restore();
      return redirect ('/Turista/suspender');
    }

    public function deleteTurista(Request $request, $id){
      $request->user()->authorizeRoles(['user']);
      $prueba= Turista::onlyTrashed()->where('id', $id)->forceDelete();
      return redirect ('/Turista/suspender');
    }

    //FINAL TURISTA

    //INICIO PAQUETE

    public function paquete(Request $request)
    {
        $notes = Paquete::all();
        $request->user()->authorizeRoles(['admin']);
        return view("paquete", ['paquetes' => $notes]);

    }

    public function guardarPaquete(Request $request)
    {

        Paquete::create($request->all());

        return redirect ('/Paquete');
    }

    public function actualizarPaquete(Paquete $note){
      $note->update(request()->all());
      return redirect ('/Paquete');
    }

    public function editarPaquete(Request $request , Paquete $note){

      $request->user()->authorizeRoles(['admin']);
      return view('paqueteEditar', compact('note'));
    }

    public function eliminarPaquete(Request $request , Paquete $note){

      $request->user()->authorizeRoles(['admin']);
      return view('paqueteEliminar', compact('note'));
    }

    public function borrarPaquete(Paquete $note){
      $note->delete();
      return redirect ('/Paquete');
    }

    public function Paquetesuspender(Request $request)
    {

      $suspe = Paquete::onlyTrashed()->get();
      $request->user()->authorizeRoles(['admin']);

        return view("Paquetesuspender",['paquetes' => $suspe]);
    }


    public function suspenderPaquete(Request $request, $id){
      $request->user()->authorizeRoles(['admin']);
      $prueba= Paquete::onlyTrashed()->where('id', $id)->restore();
      return redirect ('/Paquete/suspender');
    }

    public function deletePaquete(Request $request, $id){
      $request->user()->authorizeRoles(['admin']);
      $prueba= Paquete::onlyTrashed()->where('id', $id)->forceDelete();
      return redirect ('/Paquete/suspender');
    }

    //FINAL PAQUETE

    //INICIO FOTO

    public function foto(Request $request)
    {

      $prestadores = Prestadore::all();
      $zonas = Zona::all();
      $atractivos = Atractivo::all();
      $actividades = Actividade::all();


        $notes = Foto::all();
        $request->user()->authorizeRoles(['admin', 'gerente']);

        return view("foto", ['fotos' => $notes], compact('prestadores', 'zonas', 'atractivos', 'actividades'));



    }



    public function guardarFoto(Request $request)
    {
      if($request->hasFile('imagen'))
      {
          $fileNameExt = $request->file('imagen')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen')->storeAs('imagen/foto/',$fileNameToStore);
      }


      $post = new Foto;
      if($request->hasFile('imagen')){
                  $post->imagen = $fileNameToStore;
              }

        $post->Galeria = request()->Galeria;
        $post->title = request()->title;
        $post->descripcion = request()->descripcion;
        $post->RIF_Prest = request()->RIF_Prest;
        $post->id_Zona = request()->id_Zona;
        $post->id_Atrac = request()->id_Atrac;
        $post->id_Activi = request()->id_Activi;

        $post->save();




          //Prestadore::create($request->all());
          return redirect ('/Foto');
    }

    public function editarFoto(Request $request , Foto $note){

      $prestadores = Prestadore::all();
      $zonas = Zona::all();
      $atractivos = Atractivo::all();
      $actividades = Actividade::all();

      $request->user()->authorizeRoles(['admin', 'gerente']);
      return view('fotoEditar', compact('note', 'prestadores', 'zonas', 'atractivos', 'actividades'));


    }

    public function actualizarFoto(Request $request, $id){

        $post = Foto::find($id);

      if($request->hasFile('imagen'))
      {


          $fileNameExt = $request->file('imagen')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen')->storeAs('imagen/foto',$fileNameToStore);
      }


      if($request->hasFile('imagen')){
                  $post->imagen = $fileNameToStore;
              }
              $post->Galeria = request()->Galeria;
              $post->title = request()->title;
              $post->descripcion = request()->descripcion;
              $post->RIF_Prest = request()->RIF_Prest;
              $post->id_Zona = request()->id_Zona;
              $post->id_Atrac = request()->id_Atrac;
              $post->id_Activi = request()->id_Activi;

              $post->save();


      //$note->update(request()->all());
      return redirect ('/Foto');
    }


    public function borrarFoto(Foto $note){

      Storage::delete('imagen/foto/'. $note->imagen);
      $note->delete();
      return redirect ('/Foto');
    }


    //FINAL FOTO


    //INICIO ZONA

    public function zona(Request $request)
    {
        $notes = Zona::all();
        $request->user()->authorizeRoles(['admin', 'gerente', 'promotor']);
        return view("zona", ['zonas' => $notes]);
    }

    public function guardarZona(Request $request)
    {

      $post = new Zona;

      if($request->hasFile('imagen1'))
      {


          $fileNameExt = $request->file('imagen1')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen1')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen1')->storeAs('imagen/zona/',$fileNameToStore);
      }


      if($request->hasFile('imagen1')){
                  $post->imagen1 = $fileNameToStore;
              }

      if($request->hasFile('imagen2'))
      {


          $fileNameExt = $request->file('imagen2')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen2')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen2')->storeAs('imagen/zona/',$fileNameToStore);
      }


      if($request->hasFile('imagen2')){
          $post->imagen2 = $fileNameToStore;
      }

    if($request->hasFile('imagen3'))
    {


        $fileNameExt = $request->file('imagen3')->getClientOriginalName();
        $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        $fileExt = $request->file('imagen3')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
        $pathToStore = $request->file('imagen3')->storeAs('imagen/zona/',$fileNameToStore);
    }


      if($request->hasFile('imagen3')){
          $post->imagen3 = $fileNameToStore;
      }


      $post->nombre = request()->nombre;
      $post->Descripcion_Zona = request()->Descripcion_Zona;

      $post->save();

        //Zona::create($request->all());
        return redirect ('/Zona');

    }

    public function actualizarZona(Request $request,  $id){

        $post = Zona::find($id);

      if($request->hasFile('imagen1'))
      {


          $fileNameExt = $request->file('imagen1')->getClientOriginalName();
          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
          $fileExt = $request->file('imagen1')->getClientOriginalExtension();
          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
          $pathToStore = $request->file('imagen1')->storeAs('imagen/zona/',$fileNameToStore);
      }


      if($request->hasFile('imagen1')){
                  $post->imagen1 = $fileNameToStore;
              }

              if($request->hasFile('imagen2'))
              {


                  $fileNameExt = $request->file('imagen2')->getClientOriginalName();
                  $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
                  $fileExt = $request->file('imagen2')->getClientOriginalExtension();
                  $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
                  $pathToStore = $request->file('imagen2')->storeAs('imagen/zona/',$fileNameToStore);
              }


              if($request->hasFile('imagen2')){
                          $post->imagen2 = $fileNameToStore;
                      }

                      if($request->hasFile('imagen3'))
                      {


                          $fileNameExt = $request->file('imagen3')->getClientOriginalName();
                          $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
                          $fileExt = $request->file('imagen3')->getClientOriginalExtension();
                          $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
                          $pathToStore = $request->file('imagen3')->storeAs('imagen/zona/',$fileNameToStore);
                      }


                      if($request->hasFile('imagen3')){
                                  $post->imagen3 = $fileNameToStore;
                              }


      $post->nombre = request()->nombre;
      $post->Descripcion_Zona = request()->Descripcion_Zona;


      $post->save();

      //$note->update(request()->all());
      return redirect ('/Zona');
    }

    public function editarZona(Request $request , Zona $note){

        $request->user()->authorizeRoles(['admin', 'gerente', 'promotor']);
      return view('zonaEditar', compact('note'));
    }

    public function eliminarZona(Request $request , Zona $note){

      $request->user()->authorizeRoles(['admin', 'gerente', 'promotor']);
      return view('zonaEliminar', compact('note'));
    }

    public function borrarZona(Zona $note){
      $note->delete();
      return redirect ('/Zona');
    }

    public function Zonasuspender(Request $request)
    {

      $suspe = Zona::onlyTrashed()->get();
        $request->user()->authorizeRoles(['admin', 'gerente', 'promotor']);

        return view("Zonasuspender",['zonas' => $suspe]);
    }


    public function suspenderZona(Request $request, $id){
      $request->user()->authorizeRoles(['admin', 'gerente', 'promotor']);
      $prueba= Zona::onlyTrashed()->where('id', $id)->restore();
      return redirect ('/Zona/suspender');
    }

    public function deleteZona(Request $request, $id){
      $request->user()->authorizeRoles(['admin', 'gerente', 'promotor']);
      $prueba= Zona::onlyTrashed()->where('id', $id)->forceDelete();
      return redirect ('/Zona/suspender');
    }

    //FINAL ZONA


    //INICIO ATRACTIVO

    public function atractivo(Request $request)
    {
        $zonas = Zona::all();
        $notes = Atractivo::all();
        $request->user()->authorizeRoles(['gerente', 'promotor']);
        return view("atractivo" , ['atractivos' => $notes], compact('zonas'));
    }

    public function guardarAtractivo(Request $request)
    {



      $post = new Atractivo;

      $post->zona_id = request()->zona_id;
      $post->Nombre_Atractivo = request()->Nombre_Atractivo;
      $post->Ubicacion = request()->Ubicacion;
      $post->Descripcion_Atractivo = request()->Descripcion_Atractivo;

      $post->save();


        //Atractivo::create($request->all());

        return redirect ('/Atractivo');
    }

    public function actualizarAtractivo(Request $request, $id){



      $post = Atractivo::find($id);

      $post->zona_id = request()->zona_id;
      $post->Nombre_Atractivo = request()->Nombre_Atractivo;
      $post->Ubicacion = request()->Ubicacion;
      $post->Descripcion_Atractivo = request()->Descripcion_Atractivo;

      $post->save();


      //$note->update(request()->all());
      return redirect ('/Atractivo');
    }

    public function editarAtractivo(Request $request , Atractivo $note){
      $zonas = Zona::all();
      $request->user()->authorizeRoles(['gerente', 'promotor']);
      return view('atractivoEditar', compact('note', 'zonas'));
    }

    public function eliminarAtractivo(Request $request , Atractivo $note){

      $request->user()->authorizeRoles(['gerente', 'promotor']);
      return view('atractivoEliminar', compact('note'));
    }

    public function borrarAtractivo(Atractivo $note){
      $note->delete();
      return redirect ('/Atractivo');
    }

    public function Atractivosuspender(Request $request)
    {

      $suspe = Atractivo::onlyTrashed()->get();
      $request->user()->authorizeRoles(['gerente', 'promotor']);

        return view("Atractivosuspender",['atractivos' => $suspe]);
    }


    public function suspenderAtractivo(Request $request, $id){
    $request->user()->authorizeRoles(['gerente', 'promotor']);
      $prueba= Atractivo::onlyTrashed()->where('id', $id)->restore();
      return redirect ('/Atractivo/suspender');
    }

    public function deleteAtractivo(Request $request, $id){
      $request->user()->authorizeRoles(['gerente', 'promotor']);
      $prueba= Atractivo::onlyTrashed()->where('id', $id)->forceDelete();
      return redirect ('/Atractivo/suspender');
    }

    //FINAL ATRACTIVO


    //INICIO PLANES

    public function plane(Request $request)
    {
        $notes = Plane::all();
        $request->user()->authorizeRoles(['admin']);
        return view("plane", ['planes' => $notes]);
    }

    public function guardarPlane(Request $request)
    {

        Plane::create($request->all());

        return redirect ('/Plane');
    }

    public function actualizarPlane(Plane $note){
      $note->update(request()->all());
      return redirect ('/Plane');
    }

    public function editarPlane(Request $request , Plane $note){

      $request->user()->authorizeRoles(['admin']);
      return view('planeEditar', compact('note'));
    }

    public function eliminarPlane(Request $request , Plane $note){

      $request->user()->authorizeRoles(['admin']);
      return view('planeEliminar', compact('note'));
    }

    public function borrarPlane(Plane $note){
      $note->delete();
      return redirect ('/Plane');
    }

    public function Planesuspender(Request $request)
    {

      $suspe = Plane::onlyTrashed()->get();
      $request->user()->authorizeRoles(['admin']);

        return view("Planesuspender",['planes' => $suspe]);
    }


    public function suspenderPlane(Request $request, $id){
    $request->user()->authorizeRoles(['admin']);
      $prueba= Plane::onlyTrashed()->where('id', $id)->restore();
      return redirect ('/Plane/suspender');
    }

    public function deletePlane(Request $request, $id){
    $request->user()->authorizeRoles(['admin']);
      $prueba= Plane::onlyTrashed()->where('id', $id)->forceDelete();
      return redirect ('/Plane/suspender');
    }


    //FINAL PLANES


    //INICIO LOGIN

    public function logo(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        return view("login");
    }

    public function guardarLogo(Request $request)
    {

        Logo::create($request->all());

        return redirect ('/Logo');
    }

    //FINAL LOGIN

    //INICIO REGISTRO

    public function registro(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        return view("registro");
    }

    public function guardarRegistro(Request $request)
    {

        Registro::create($request->all());

        return redirect ('/Registro');
    }

    //FINAL REGISTRO



    //INICIO ACTIVIDADES

    public function actividad(Request $request)
    {
        $notes = Actividade::all();
        $request->user()->authorizeRoles(['admin']);
        return view("actividades", ['actividades' => $notes]);
    }

    public function guardarActividad(Request $request)
    {

        Actividade::create($request->all());

        return redirect ('/actividades');
    }

    public function actualizarActividad(Actividade $note){
      $note->update(request()->all());
      return redirect ('/actividades');
    }

    public function editarActividad(Request $request , Actividade $note){

      $request->user()->authorizeRoles(['admin']);
      return view('actividadEditar', compact('note'));
    }

    public function eliminarActividad(Request $request , Actividade $note){

      $request->user()->authorizeRoles(['admin']);
      return view('actividadEliminar', compact('note'));
    }

    public function borrarActividad(Actividade $note){
      $note->delete();
      return redirect ('/actividades');
    }

    public function Actividadsuspender(Request $request)
    {

      $suspe = Actividade::onlyTrashed()->get();
      $request->user()->authorizeRoles(['admin']);

        return view("Actividadsuspender",['actividades' => $suspe]);
    }


    public function suspenderActividad(Request $request, $id){
    $request->user()->authorizeRoles(['admin']);
      $prueba= Actividade::onlyTrashed()->where('id', $id)->restore();
      return redirect ('/actividades/suspender');
    }

    public function deleteActividad(Request $request, $id){
    $request->user()->authorizeRoles(['admin']);
      $prueba= Actividade::onlyTrashed()->where('id', $id)->forceDelete();
      return redirect ('/actividades/suspender');
    }


    //FINAL ACTIVIDADES


}
