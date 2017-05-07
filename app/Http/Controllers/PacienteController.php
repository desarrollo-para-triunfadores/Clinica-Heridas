<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Paciente;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class PacienteController extends Controller {

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
        return view('pacientes.main')->with('pacientes', $pacientes);
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
        /* datos de persona */
        $persona = new Persona($request->all());
        $persona->save();
        /*         * ************* */
        $paciente = new Paciente();
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
        $localidades = Localidad::all();
        $paises = Pais::all();
        return view('pacientes.show')
                        ->with('paciente', $paciente)
                        ->with('pais', $paises)
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
        $persona->fill($request->all());
        $persona->save();
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
        $paciente->delete();
        Session::flash('message', 'La información asociada al paciente ha sido eliminada del sistema');
        return redirect()->route('pacientes.index');
    }

}
