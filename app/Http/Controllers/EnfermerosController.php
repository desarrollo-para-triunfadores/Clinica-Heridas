<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Pais;
use App\Localidad;
use App\Enfermero;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class EnfermerosController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $enfermeros = Enfermero::all();
        $paises = Pais::all();
        $localidades = Localidad::all();
        return view('enfermeros.main')
                        ->with('enfermeros', $enfermeros)
                        ->with('paises', $paises)
                        ->with('localidades', $localidades);
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
        $nombreImagen = 'sin imagen';
        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'persona_' . time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('personas')->put($nombreImagen, \File::get($file));
        }
        /* datos de persona */
        $persona = new Persona($request->all());
        $persona->foto_perfil = $nombreImagen;
        $persona->save();
        /*         * ************* */
        $enfermero = new Enfermero($request->all());
        $enfermero->persona_id = $persona->id;
        $enfermero->save();
        Session::flash('message', 'Se ha registrado un nuevo enfermero.');
        return redirect()->route('enfermeros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $enfermero = Enfermero::find($id);
        $paises = Pais::all();       
        $localidades = Localidad::all();
        return view('enfermeros.show')
                        ->with('enfermero', $enfermero)
                        ->with('paises', $paises)
                        ->with('localidades', $localidades);
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
        $enfermero = Enfermero::find($id);
        $persona = Persona::find($enfermero->persona_id);

        if ($request->file('imagen')) {
            $file = $request->file('imagen');
            $nombreImagen = 'persona_' . time() . '.' . $file->getClientOriginalExtension();
            if (Storage::disk('personas')->exists($persona->foto_perfil)) {
                Storage::disk('personas')->delete($persona->foto_perfil);   // Borramos la imagen anterior.      
            }
            $persona->fill($request->all());
            $persona->foto_perfil = $nombreImagen;  // Actualizamos el nombre de la nueva imagen.
            Storage::disk('personas')->put($nombreImagen, \File::get($file)); // Movemos la imagen nueva al directorio /imagenes/personas           
            $persona->save();
            $enfermero->fill($request->all());
            $enfermero->save();
            Session::flash('message', '¡Se ha actualizado la información del enfermero con éxito!');
            return redirect()->route('enfermeros.index');
        }
        $persona->fill($request->all());
        $persona->save();
        $enfermero->fill($request->all());
        $enfermero->save();
        Session::flash('message', '¡Se ha actualizado la información del enfermero con éxito!');
        return redirect()->route('enfermeros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $enfermero = Enfermero::find($id);
        $persona = Persona::find($enfermero->persona_id);
        if ($persona->foto_perfil != 'sin imagen') {
            Storage::disk('personas')->delete($persona->foto_perfil); // Borramos la imagen asociada.
        }
        $enfermero->delete();
        $persona->delete();
        Session::flash('message', 'La información asociada al enfermero  ha sido eliminada del sistema');
        return redirect()->route('enfermeros.index');
    }

}
