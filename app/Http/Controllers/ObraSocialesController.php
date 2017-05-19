<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ObraSocial;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class ObraSocialesController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $obras_sociales = ObraSocial::all();
        return view('obras_sociales.main')->with('obras_sociales', $obras_sociales);
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
        $obra_social = new ObraSocial($request->all());
        $obra_social->save();      
        Session::flash('message', 'Se ha registrado una nueva obra social.');
        return redirect()->route('obras_sociales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $obra_social = ObraSocial::find($id);        
        return view('obras_sociales.show')
                        ->with('obra_social', $obra_social)
                   ;
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
        $obra_social = ObraSocial::find($id);      
        $obra_social->fill($request->all());
        $obra_social->save();
        Session::flash('message', '¡Se ha actualizado la información de la obra social con éxito!');
        return redirect()->route('obras_sociales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $obra_social = ObraSocial::find($id);
        $obra_social->delete();
        Session::flash('message', 'La información asociada a la obra social ha sido eliminada del sistema');
        return redirect()->route('obras_sociales.index');
    }

}
