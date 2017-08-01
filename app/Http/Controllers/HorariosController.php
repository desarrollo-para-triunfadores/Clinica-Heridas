<?php

namespace App\Http\Controllers;

use App\Horario_atencion;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class HorariosController extends Controller {

    public function __construct() {
        Carbon::setlocale('es'); // Instancio en Español el manejador de fechas de Laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $horarios = Horario_atencion::all();
        return view('horarios_atencion.main')
                        ->with('horarios', $horarios);
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
        $horario = new Horario_atencion($request->all());
        $horario->save();
        Session::flash('message', '¡Se ha registrado un nuevo horario de atención!');
        return redirect()->route('horarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $horario = Horario_atencion::find($id);
        return view('horarios_atencion.show')->with('horario', $horario);
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
        $horario = Horario_atencion::find($id);
        $horario->fill($request->all());

        if (!$request->lunes) {
            $horario->lunes = 0;
        }
        if (!$request->martes) {
            $horario->martes = 0;
        }
        if (!$request->miercoles) {
            $horario->miercoles = 0;
        }
        if (!$request->jueves) {
            $horario->jueves = 0;
        }
        if (!$request->viernes) {
            $horario->viernes = 0;
        }
        if (!$request->sabado) {
            $horario->sabado = 0;
        }
        if (!$request->domingo) {
            $horario->domingo = 0;
        }

        $horario->save();
        Session::flash('message', '¡Se ha actualizado la información del horario de atención con éxito!');
        return redirect()->route('horarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $horario = Horario_atencion::find($id);
        $horario->delete();
        Session::flash('message', 'La información asociada al registro ha sido eliminada del sistema');
        return redirect()->route('horarios.index');
    }

}
