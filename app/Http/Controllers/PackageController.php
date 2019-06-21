<?php

namespace App\Http\Controllers;

use App\Package;
use App\Actividade;
use App\Atractivo;
use App\Prestadore;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::paginate();

        return view('packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividades = Actividade::all();
        $atractivos = Atractivo::all();
        $prestadore = Prestadore::all();
        return view('packages.create', compact ('actividades', 'atractivos'), ['prestadores' => $prestadore]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = Package::create($request->all());

        $id = request()->id_Actividad;
        $package->actividades()->sync($id);

        $idAtrac = request()->id_Atractivo;
        $package->atractivos()->sync($idAtrac);

        $RifPrestador = request()->RIF;
        $package->prestadores()->sync($RifPrestador);

        return redirect()->route('packages.index')
          ->with('info', 'Paquete creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('packages.show', compact ('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $actividades = Actividade::all();
        $atractivos = Atractivo::all();
        $prestadore = Prestadore::all();

        return view('packages.edit', compact('package', 'actividades', 'atractivos'), ['prestadores' => $prestadore]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $package->update($request->all());

        $id = request()->id_Actividad;
        $package->actividades()->sync($id);

        $idAtrac = request()->id_Atractivo;
        $package->atractivos()->sync($idAtrac);

        $RifPrestador = request()->RIF;
        $package->prestadores()->sync($RifPrestador);

        return redirect()->route('packages.index')
          ->with('info', 'Paquete actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return back()->with('info', 'Eliminado correctamente');
    }

    public function invoice()
    {

        $paquetes = $this->getpaquete();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.paquetes', compact('paquetes', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('paquetes.pdf');
        //return $pdf->download('invoice'); //para descargar
    }

    public function getpaquete()
    {
        $paquetes = Package::all();

        return $paquetes;
    }

    public function invoiceDownload()
    {

        $paquetes = $this->getpaquete();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.paquetes', compact('paquetes', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('paquetes.pdf');
        //return $pdf->download('invoice'); //para descargar
    }
}
