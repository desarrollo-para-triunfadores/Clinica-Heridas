<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Valoracion;
use App\Complicacion;
use App\Seguimiento;
use App\Tratamiento;
use App\TratamientoSeguimiento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class ValoracionesController extends Controller {

    public function __construct() {
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $valoraciones = Valoracion::all();
        return view('/valoraciones/main')->with('valoraciones', $valoraciones); // se devuelven los registros
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $valoracion = new Valoracion($request->all());
        $valoracion->observaciones = $request->observaciones_valoracion;
        $valoracion->save();


        $seguimiento = new Seguimiento($request->all());
        $seguimiento->valoracion_id = $valoracion->id;
        $seguimiento->observacion = $request->observaciones_seguimiento;
        $seguimiento->save();


        $cantidad_tratamientos = (int) $request->cantidad_caracteristicas;
        for ($i = 1; $i <= $cantidad_tratamientos; $i++) {

            $tratamientoPaciente = new TratamientoSeguimiento();
            $tratamientoPaciente->seguimiento_id = $seguimiento->id;
            $tratamientoPaciente->tratamiento_id = $request["tratamiento" . $i];  
            $tratamientoPaciente->save();
        }



        Session::flash('message', '¡Se ha registrado a un nuevo registro de valoración específica!');
        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $tratamientos = Tratamiento::all();
        $valoracion = Valoracion::find($id);
        return view('valoraciones.main')
                        ->with('tratamientos', $tratamientos)
                        ->with('valoracion', $valoracion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $tratamientos = Tratamiento::all();
        $complicaciones = Complicacion::all();
        return view('valoraciones.formulario.create')
                        ->with('complicaciones', $complicaciones)
                        ->with('tratamientos', $tratamientos)
                        ->with('paciente_id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $valoracion = Valoracion::find($id);
        $valoracion->fill($request->all());
        $valoracion->save();
        Session::flash('message', '¡Se ha actualizado la información del registro de valoración específica con éxito!');
        return redirect()->route('valoraciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $valoracion = Valoracion::find($id);
        $valoracion->delete();
        Session::flash('message', '¡El registro de valoración específica seleccionado ha sido eliminado!');
        return redirect()->route('valoraciones.index');
    }

}
