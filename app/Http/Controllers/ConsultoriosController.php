<?php

namespace App\Http\Controllers;

use App\Consultorio;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Consultorios;
use App\Localidad;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class ConsultoriosController extends Controller
{
   
    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $consultorios = Consultorio::all();
        $localidades = Localidad::all();
        return view('consultorios.main')
            ->with('consultorios', $consultorios)
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
        $consultorio = new Consultorio($request->all());
        $consultorio->save();
        Session::flash('message', 'Se ha registrado un nuevo médico.');
        return redirect()->route('consultorios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $consultorio = Consultorio::find($id);
        return view('consultorios.show')->with('consultorio', $consultorio);
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
        $consultorio = Consultorio::find($id);
        $consultorio->fill($request->all());
        $consultorio->save();
        Session::flash('message', '¡Se ha actualizado la información del médico con éxito!');
        return redirect()->route('consultorios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $consultorio = Consultorio::find($id);
        $consultorio->delete();
        Session::flash('message', 'La información asociada al mádico ha sido eliminada del sistema');
        return redirect()->route('consultorios.index');
    }
}
