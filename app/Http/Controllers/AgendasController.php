<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Feriados;
use App\Localidad;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class AgendasController extends Controller
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
        $agendas = Agenda::all();
        return view('agendas.main')
            ->with('agendas', $agendas);
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
        $agenda = new Feriado($request->all());
        $agenda->usuario_id = Auth::user()->id;
        $agenda->fecha = $request->fecha;
        $agenda->save();
        Session::flash('message', 'Se ha registrado un nuevo médico.');
        return redirect()->route('agendas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $agenda = Agenda::find($id);
        return view('agendas.show')->with('agenda', $agenda);
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
        $agenda = Feriado::find($id);
        $agenda->fill($request->all());
        $agenda->save();
        Session::flash('message', '¡Se ha actualizado la información del médico con éxito!');
        return redirect()->route('agendas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $agenda = Feriado::find($id);
        $agenda->delete();
        Session::flash('message', 'La información asociada al mádico ha sido eliminada del sistema');
        return redirect()->route('agendas.index');
    }
}
