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

class SeguimientosController extends Controller {

    public function __construct() {
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $seguimientos = Seguimiento::all();
        return view('/seguimientos/main')->with('seguimientos', $seguimientos); // se devuelven los registros
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
        
        
        $seguimiento = new Seguimiento($request->all());
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
        //
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
        return view('valoraciones.formulario.create_seguimiento')
                        ->with('complicaciones', $complicaciones)
                        ->with('tratamientos', $tratamientos)
                        ->with('valoracion_id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $seguimiento = Seguimiento::find($id);
        $seguimiento->fill($request->all());
        $seguimiento->save();
        Session::flash('message', '¡Se ha actualizado la información del registro de seguimiento con éxito!');
        return redirect()->route('seguimientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $seguimiento = Seguimiento::find($id);
        $seguimiento->delete();
        Session::flash('message', '¡El registro de seguimiento seleccionado ha sido eliminado!');
        return redirect()->route('seguimientos.index');
    }

}
