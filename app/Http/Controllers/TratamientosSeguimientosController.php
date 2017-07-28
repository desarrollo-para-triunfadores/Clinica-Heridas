<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TratamientoSeguimiento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class TratamientosSeguimientosController extends Controller
{
       public function __construct() {
        Carbon::setlocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $tratamientos_seguimiento = TratamientoSeguimiento::all();
        return view('/tratamientos_seguimiento/main')->with('tratamientos_seguimiento', $tratamientos_seguimiento); // se devuelven los registros
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
        $tratamiento_seguimiento = new TratamientoSeguimiento($request->all());
        $tratamiento_seguimiento->save();
        Session::flash('message', '¡Se ha registrado a un nuevo registro de tratamiento para el seguimiento!');
        return redirect()->route('tratamientos_seguimiento.index');
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
        $tratamiento_seguimiento = TratamientoSeguimiento::find($id);
        $tratamiento_seguimiento->fill($request->all());
        $tratamiento_seguimiento->save();
        Session::flash('message', '¡Se ha actualizado la información del registro de tratamiento para el seguimiento con éxito!');
        return redirect()->route('tratamientos_seguimiento.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $tratamiento_seguimiento = TratamientoSeguimiento::find($id);
        $tratamiento_seguimiento->delete();
        Session::flash('message', '¡El registro de tratamiento para el seguimiento seleccionado ha sido eliminado!');
        return redirect()->route('tratamientos_seguimiento.index');
    }
}
