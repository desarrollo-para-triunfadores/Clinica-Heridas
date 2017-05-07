<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Provincia;
use App\Localidad;
use App\Pais;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
Use Session;

class ProvinciasController extends Controller {

    public function __construct() {
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $provincias = Provincia::all();
        $paises = Pais::all();
        return view('provincias.main')->with('provincias', $provincias)->with('paises', $paises); // se devuelven los registros
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
        $provincia = new Provincia($request->all());
        $provincia->save();
        Session::flash('message', 'Se ha registrado a una nueva provincia.');
        return redirect()->route('provincias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $paises = Pais::all()->lists('nombre', 'id');
        $provincia = Provincia::find($id);
        return view('provincias.show')
                        ->with('provincia', $provincia)
                        ->with('paises', $paises);
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
        $provincia = Provincia::find($id);
        $provincia->fill($request->all());
        $provincia->save();
        Session::flash('message', 'Se ha actualizado la información');
        return redirect()->route('provincias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $provincia = Provincia::find($id);
        $provincia->delete();
        Session::flash('message', 'La provincia ha sido eliminada');
        return redirect()->route('provincias.index');
    }

}
