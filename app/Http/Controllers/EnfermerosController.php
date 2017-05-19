<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Enfermero;
use Carbon\Carbon;
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
        return view('enfermeros.main')->with('enfermeros', $enfermeros);
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
        $enfermero = new Enfermero();
        $enfermero->persona_id = $persona->id;
        $enfermero->save();
        Session::flash('message', 'Se ha registrado un nuevo paciente.');
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
        $localidades = Localidad::all();
        $paises = Pais::all();
        return view('enfermeros.show')
                        ->with('paciente', $enfermero)
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
        $enfermero = Enfermero::find($id);
        $persona = Persona::find($enfermero->persona_id);
        $persona->fill($request->all());
        $persona->save();
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
        $enfermero->delete();
        Session::flash('message', 'La información asociada al enfermero  ha sido eliminada del sistema');
        return redirect()->route('enfermeros.index');
    }

}
