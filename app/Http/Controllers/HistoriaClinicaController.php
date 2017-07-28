<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;
use App\Paciente;
use App\Antecedentes;
use App\MedicacionPaciente;
use App\FactorPaciente;
use App\Factor;
use App\Medicamento;
use App\Estudio;
use Carbon\Carbon;
use Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;

class HistoriaClinicaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $factores = Factor::all();
        $medicamentos = Medicamento::all();
        return view('pacientes.create')
                        ->with('medicamentos', $medicamentos)
                        ->with('factores', $factores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
      
               
        $antecedente = new Antecedentes($request->all());
        $antecedente->observaciones = $request->observaciones_antecedentes;
        $antecedente->save();

        $cantidad_factores = (int) $request->cantidad_factores;
        for ($i = 1; $i <= $cantidad_factores; $i++) {

            $factor_paciente = new FactorPaciente();
            $factor_paciente->paciente_id = $request->paciente_id;
            $factor_paciente->factor_id = $request["factor" . $i];           
            $factor_paciente->save();
                        
        }
        

        $cantidad_medicamentos = (int) $request->cantidad_caracteristicas;
        for ($i = 1; $i <= $cantidad_medicamentos; $i++) {

            $medicacion = new MedicacionPaciente();
            $medicacion->paciente_id = $request->paciente_id;
            $medicacion->medicamento_id = $request["medicamento" . $i];  
            $medicacion->save();
        }

        $estudio = new Estudio($request->all());
        $estudio->observaciones = $request->observaciones_estudios;
        $estudio->save();


        Session::flash('message', 'Se ha registrado un nuevo médico.');
        return redirect()->route('pacientes.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
