<?php

namespace App\Http\Controllers;

use App\Feriado;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Feriados;
use App\Localidad;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class FeriadosController extends Controller
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
        $feriados = Feriado::all();
        return view('feriados.main')
            ->with('feriados', $feriados);
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
        $feriado = new Feriado($request->all());
        $feriado->usuario_id = Auth::user()->id;
        $feriado->fecha = $request->fecha;
        $feriado->save();
        Session::flash('message', 'Se ha registrado un nuevo médico.');
        return redirect()->route('feriados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $feriado = Feriado::find($id);
        return view('feriados.show')->with('feriado', $feriado);
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
        $feriado = Feriado::find($id);
        $feriado->fill($request->all());
        $feriado->save();
        Session::flash('message', '¡Se ha actualizado la información del médico con éxito!');
        return redirect()->route('feriados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $feriado = Feriado::find($id);
        $feriado->delete();
        Session::flash('message', 'La información asociada al mádico ha sido eliminada del sistema');
        return redirect()->route('feriados.index');
    }
}
