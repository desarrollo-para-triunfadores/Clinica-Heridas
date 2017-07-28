<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Factor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class FactoresController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $factores = Factor::all();
        return view('factores_riesgo.main')->with('factores', $factores);
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
        $factor = new Factor($request->all());
        $factor->save();
        Session::flash('message', 'Se ha registrado un nuevo factor de riesgo.');
        return redirect()->route('factores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $factor = Factor::find($id);
        return view('factores.show')->with('medico', $factor);
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
        $factor = Factor::find($id);
        $factor->fill($request->all());
        $factor->save();
        Session::flash('message', '¡Se ha actualizado la información del factor de riesgo con éxito!');
        return redirect()->route('factores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $factor = Factor::find($id);
        $factor->delete();
        Session::flash('message', 'La información asociada al factor de riesgo ha sido eliminada del sistema');
        return redirect()->route('factores.index');
    }

}
