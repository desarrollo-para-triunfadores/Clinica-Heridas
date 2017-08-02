<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Paciente;
use App\Pais;
use App\ObraSocial;
use App\Medico;
use App\Localidad;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;


class PacientesController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $pacientes = Paciente::all();
        $paises = Pais::all();
        $obras = ObraSocial::all();
        $medicos = Medico::all();
        $localidades = Localidad::all();
        return view('pacientes.main')
                        ->with('pacientes', $pacientes)
                        ->with('obras', $obras)
                        ->with('medicos', $medicos)
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
            $nombreImagen = 'persona_' . time() . '.jpg' /*. $file->getClientOriginalExtension()*/;
            Storage::disk('personas')->put($nombreImagen, \File::get($file));
        }
        /* datos de persona */
        $persona = new Persona($request->all());
        $persona->foto_perfil = $nombreImagen;
        $persona->save();
        /* datos de paciente */
        $paciente = new Paciente($request->all());
        $paciente->persona_id = $persona->id;
        $paciente->save();
        Session::flash('message', 'Se ha registrado un nuevo paciente.');
        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $paciente = Paciente::find($id);
        $paises = Pais::all();
        $obras = ObraSocial::all();
        $medicos = Medico::all();
        $localidades = Localidad::all();
        return view('pacientes.show')
                        ->with('paciente', $paciente)
                        ->with('obras', $obras)
                        ->with('medicos', $medicos)
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
        $paciente = Paciente::find($id);
        $persona = Persona::find($paciente->persona_id);
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
            $paciente->fill($request->all());
            $paciente->save();
            Session::flash('message', '¡Se ha actualizado la información del paciente con éxito!');
            return redirect()->route('pacientes.index');
        }
        $persona->fill($request->all());
        $persona->save();
        $paciente->fill($request->all());
        $paciente->save();
        Session::flash('message', '¡Se ha actualizado la información del paciente con éxito!');
        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $paciente = Paciente::find($id);
        $persona = Persona::find($paciente->persona_id);
        if ($persona->foto_perfil != 'sin imagen') {
            Storage::disk('personas')->delete($persona->foto_perfil); // Borramos la imagen asociada.
        }
        $paciente->delete();
        $persona->delete();
        Session::flash('message', 'La información asociada al paciente ha sido eliminada del sistema');
        return redirect()->route('pacientes.index');
    }

}
