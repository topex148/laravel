<?php

namespace App\Http\Controllers;

use App\Prestadore;
use App\Actividade;
use Auth;
use App\Atractivo;
use App\Zona;
use App\Foto;
use App\Package;
use File;
use Storage;
use Illuminate\Http\Request;


class ActividadeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $actividades = Actividade::paginate();
      $fotos = Foto::all();

      return view('actividades.index', compact('actividades', 'fotos'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $paquetes = Package::all();
      return view('actividades.create', compact( 'paquetes'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $actividade = Actividade::create($request->all());

      $id = request()->id_P_3;
      $actividade->packages()->sync($id);

      return redirect()->route('actividades.index')
        ->with('info', 'Actividad creada con exito');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Actividade  $actividade
   * @return \Illuminate\Http\Response
   */
  public function show(Actividade $actividade)
  {
      return view('actividades.show', compact ('actividade'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Actividade  $actividade
   * @return \Illuminate\Http\Response
   */
  public function edit(Actividade $actividade)
  {
      $paquetes = Package::all();

      return view('actividades.edit', compact ('actividade', 'paquetes'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Actividade  $actividade
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Actividade $actividade)
  {
      $actividade->update($request->all());

      $id = request()->id_P_3;
      $actividade->packages()->sync($id);

      return redirect()->route('actividades.index')
        ->with('info', 'Actividad actualizada con exito');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Actividade  $actividade
   * @return \Illuminate\Http\Response
   */
  public function destroy(Actividade $actividade)
  {
      $actividade->delete();

      return back()->with('info', 'Eliminado correctamente');
  }

  //Foto Actividade

  public function createActividade()
  {
    $prestadores = Prestadore::all();
    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();
    $fotos = Foto::all();
    return view('fotosActividades.create', compact('prestadores', 'zonas', 'atractivos', 'fotos', 'actividades'));
  }

  public function storeActividade(Request $request)
  {

  //  $foto = new Foto(request()->all());
    //\Auth::user()->fotos()->save($foto);

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


        $post->title = request()->title;
        $post->descripcion = request()->descripcion;
        $post->id_Activi = request()->id_Activi;
        $post->user_id = \Auth::user()->id;

        $post->save();
      //$foto = Foto::create($request->all());

      return redirect()->route('actividades.index')
        ->with('info', 'Foto creada con exito');
  }

  public function showActividade(Foto $foto)
  {
      return view('fotosActividades.show', compact ('foto'));
  }

  public function editActividade(Foto $foto)
  {
    $prestadores = Prestadore::all();
    $zonas = Zona::all();
    $atractivos = Atractivo::all();
    $actividades = Actividade::all();

      return view('fotosActividades.edit', compact ('foto', 'prestadores', 'zonas', 'atractivos', 'actividades'));
  }

  public function updateActividade(Request $request,  $id)
  {
    $post = Foto::find($id);

    if($request->hasFile('imagen'))
          {
              Storage::delete('imagen/foto/'.$post->imagen);

              $fileNameExt = $request->file('imagen')->getClientOriginalName();
              $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
              $fileExt = $request->file('imagen')->getClientOriginalExtension();
              $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
              $pathToStore = $request->file('imagen')->storeAs('imagen/foto',$fileNameToStore);
          }


          if($request->hasFile('imagen')){
                      $post->imagen = $fileNameToStore;
                  }

                  $post->title = request()->title;
                  $post->descripcion = request()->descripcion;
                  $post->id_Activi = request()->id_Activi;

                  $post->save();

      //$foto->update($request->all());

      return redirect()->route('actividades.index')
        ->with('info', 'Foto actualizada con exito');
  }

  public function destroyActividade(Foto $foto)
  {
      Storage::delete('imagen/foto/'.$foto->imagen);
      $foto->delete();

      return back()->with('info', 'Eliminado correctamente');
  }

  public function invoice()
  {

      $actividades = $this->getactividades();
      $date = date('Y-m-d');
      $invoice = "2222";
      $view =  \View::make('pdf.actividades', compact('actividades', 'date', 'invoice'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('actividades.pdf');
      //return $pdf->download('invoice'); //para descargar
  }

  public function getactividades()
  {
      $actividades = Actividade::all();

      return $actividades;
  }

  public function invoiceDownload()
  {

      $actividades = $this->getactividades();
      $date = date('Y-m-d');
      $invoice = "2222";
      $view =  \View::make('pdf.actividades', compact('actividades', 'date', 'invoice'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->download('actividades.pdf');
      //return $pdf->download('invoice'); //para descargar
  }


  }
