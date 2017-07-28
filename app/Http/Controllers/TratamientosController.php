<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tratamiento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class TratamientosController extends Controller {

    public function __construct() {
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $tratamientos = Tratamiento::all();
        return view('/tratamientos/main')->with('tratamientos', $tratamientos); // se devuelven los registros
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
        $tratamiento = new Tratamiento($request->all());
        $tratamiento->save();
        Session::flash('message', '¡Se ha registrado a un nuevo registro de tratamiento!');
        return redirect()->route('tratamientos.index');
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
        $tratamiento = Tratamiento::find($id);
        $tratamiento->fill($request->all());
        $tratamiento->save();
        Session::flash('message', '¡Se ha actualizado la información del registro de tratamiento con éxito!');
        return redirect()->route('tratamientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $tratamiento = Tratamiento::find($id);
        $tratamiento->delete();
        Session::flash('message', '¡El registro de tratamiento seleccionado ha sido eliminado!');
        return redirect()->route('tratamientos.index');
    }

}
