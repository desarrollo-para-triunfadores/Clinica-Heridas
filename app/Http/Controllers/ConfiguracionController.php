<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\Localidad;
use Session;
use Storage;
use Carbon\Carbon;
use App\Http\Requests;

class ConfiguracionController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {      
        $localidades = Localidad::all();
        return view('/configuracion/main')->with('localidades', $localidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $configuracion = Configuracion::find($id);
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $nombreImagen = 'configuracion_' . time() . '.' . $file->getClientOriginalExtension();
            if (Storage::disk('otros')->exists($configuracion->logo)) {
                Storage::disk('otros')->delete($configuracion->logo);   // Borramos la imagen anterior.      
            }
            $configuracion->fill($request->all());
            $configuracion->logo = $nombreImagen;  // Actualizamos el nombre de la nueva imagen.
            Storage::disk('otros')->put($nombreImagen, \File::get($file)); // Movemos la imagen nueva al directorio /imagenes/personas           
            $configuracion->save();
            Session::flash('message', 'Se ha actualizado la información');
            return redirect()->route('configuraciones.index');
        }
        $configuracion->fill($request->all());
        $configuracion->save();
        Session::flash('message', 'Se ha actualizado la información');
        return redirect()->route('configuraciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
