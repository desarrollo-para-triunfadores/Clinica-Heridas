<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Medicamento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class MedicamentosController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $medicamentos = Medicamento::all();
        return view('medicamentos.main')->with('medicamentos', $medicamentos);
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
        $medicamento = new Medicamento($request->all());
        $medicamento->save();
        Session::flash('message', 'Se ha registrado un nuevo medicamento.');
        return redirect()->route('medicamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $medicamento = Medicamento::find($id);
        return view('medicamentos.show')->with('medicamento', $medicamento);
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
        $medicamento = Medicamento::find($id);
        $medicamento->fill($request->all());
        $medicamento->save();
        Session::flash('message', '¡Se ha actualizado la información del medicamento con éxito!');
        return redirect()->route('medicamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $medicamento = Medicamento::find($id);
        $medicamento->delete();
        Session::flash('message', 'La información asociada al medicamento ha sido eliminada del sistema');
        return redirect()->route('medicamentos.index');
    }

}
