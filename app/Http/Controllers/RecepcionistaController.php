<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Recepcionista;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class RecepcionistaController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $recepcionistas = Recepcionista::all();
        return view('recepcionistas.main')->with('recepcionistas', $recepcionistas);
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
        $recepcionista = new Recepcionista();
        $recepcionista->persona_id = $persona->id;
        $recepcionista->save();
        Session::flash('message', 'Se ha registrado un nuevo paciente.');
        return redirect()->route('recepcionistas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $recepcionista = Recepcionista::find($id);
        $localidades = Localidad::all();
        $paises = Pais::all();
        return view('recepcionistas.show')
                        ->with('paciente', $recepcionista)
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
        $recepcionista = Recepcionista::find($id);
        $persona = Persona::find($recepcionista->persona_id);
        $persona->fill($request->all());
        $persona->save();
        Session::flash('message', '¡Se ha actualizado la información del recepcionista con éxito!');
        return redirect()->route('recepcionistas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $recepcionista = Recepcionista::find($id);
        $recepcionista->delete();
        Session::flash('message', 'La información asociada al recepcionista  ha sido eliminada del sistema');
        return redirect()->route('recepcionistas.index');
    }

}
