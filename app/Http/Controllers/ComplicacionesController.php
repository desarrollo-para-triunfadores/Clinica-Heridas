<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Complicacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class ComplicacionesController extends Controller {

    public function __construct() {
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $complicaciones = Complicacion::all();
        return view('/complicaciones/main')->with('complicaciones', $complicaciones); // se devuelven los registros
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
        $complicacion = new Complicacion($request->all());
        $complicacion->save();
        Session::flash('message', '¡Se ha registrado a un nuevo registro de complicacion!');
        return redirect()->route('complicaciones.index');
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
        $complicacion = Complicacion::find($id);
        $complicacion->fill($request->all());
        $complicacion->save();
        Session::flash('message', '¡Se ha actualizado la información del registro de complicacion con éxito!');
        return redirect()->route('complicaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $complicacion = Complicacion::find($id);
        $complicacion->delete();
        Session::flash('message', '¡El registro de complicacion seleccionado a sido eliminado!');
        return redirect()->route('complicaciones.index');
    }

}
