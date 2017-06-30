<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Turno;
use App\Paciente;
use App\Consultorio;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Feriados;
use App\Localidad;
use App\Enfermero;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use Jenssegers\Date\Date;

class TurnosController extends Controller {

    public function __construct() {
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {


        $pacientes = Paciente::all();
        return view('turnos.main')
                        ->with('fecha', "")
                        ->with('pacientes', $pacientes)
                        ->with('paciente', "")
                        ->with('turno_especial', false);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2(Request $request) {
        $enfermeros = Enfermero::all();
        $consultorios = Consultorio::all();
        $fecha_hoy = Carbon::now()->format('d/m/Y');
        $turnos_dia_pendientes = Turno::SearchFecha($fecha_hoy)->SearchPendientes()->orderby('updated_at', 'asc')->get();
        $turnos_en_atencion = Turno::SearchEsperando()->where('consultorio_id', '<>', null)->orderby('updated_at', 'asc')->get();
        $turnos_esperando = Turno::SearchEsperando()->where('consultorio_id', null)->orderby('updated_at', 'asc')->get();
        $turnos_pendientes = Turno::SearchFechadistinta($fecha_hoy)->SearchPendientes()->orderby('updated_at', 'asc')->get();
        $turnos_atendidos_hoy = Turno::SearchFecha($fecha_hoy)->SearchAtendidos()->orderby('updated_at', 'asc')->get();
        $turnos_atendidos = Turno::SearchDistintoEstado('pendiente')->SearchDistintoEstado('esperando')->orderby('updated_at', 'asc')->get();

        return view('turnos_del_dia.main')
                        ->with('enfermeros', $enfermeros)
                        ->with('turno_anterior', $request->turno_anterior)
                        ->with('consultorios', $consultorios)
                        ->with('turnos_dia_pendientes', $turnos_dia_pendientes)
                        ->with('turnos_en_atencion', $turnos_en_atencion)
                        ->with('turnos_esperando', $turnos_esperando)
                        ->with('turnos_pendientes', $turnos_pendientes)
                        ->with('turnos_atendidos_hoy', $turnos_atendidos_hoy)
                        ->with('turnos_atendidos', $turnos_atendidos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function turnera() {
        return view('turnera.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscar_turnos(Request $request) {


        //    tengo que armar otro metodo que reprograme el tuerno y me derive a este (seria ideal que el metedo sirve para actualizar cualquier estado)      
//dd($request);
        $paciente = "";
        $pacientes = "";
        $dt = Carbon::parse($request->fecha);
        $dia_semana = "";
        $agendas_disponibles = [];
        switch ($dt->dayOfWeek) {
            case 0:
                $dia_semana = "domingo";
                break;
            case 1:
                $dia_semana = "lunes";
                break;
            case 2:
                $dia_semana = "martes";
                break;
            case 3:
                $dia_semana = "miercoles";
                break;
            case 4:
                $dia_semana = "jueves";
                break;
            case 5:
                $dia_semana = "viernes";
                break;
            case 6:
                $dia_semana = "sabado";
                break;
            case 7:
                $dia_semana = "domingo";
                break;
        }
        $agendas_registradas = Agenda::SearchDia($dia_semana)->get();
        foreach ($agendas_registradas as $registro_agenda) {
            $turnos = Turno::SearchFecha($dt->format('d/m/Y'))->SearchAgenda($registro_agenda->id)->SearchPendientes()->get();

//               // dd($registro_agenda->cupo_turnos);
//                dd(count($turnos));
//                dd($registro_agenda->cupo_turnos > count($turnos));

            if ($registro_agenda->cupo_turnos > count($turnos)) {
                $agenda = array(
                    'agenda' => $registro_agenda,
                    'turnos_ocupados' => count($turnos)
                );
                array_push($agendas_disponibles, $agenda);
            } elseif ($request->turno_especial) {
                $agenda = array(
                    'agenda' => $registro_agenda,
                    'turnos_ocupados' => count($turnos)
                );
                array_push($agendas_disponibles, $agenda);
            }
        }

        if ($request->paciente) {
            $paciente = Paciente::find($request->paciente);
        } else {
            $pacientes = Paciente::all();
        }

        return view('turnos.main')
                        ->with('comentario_reprogramado', $request->comentario)
                        ->with('turno_id', $request->turno_id)
                        ->with('agendas', $agendas_disponibles)
                        ->with('fecha', $dt->format('d/m/Y'))
                        ->with('paciente', $paciente)
                        ->with('pacientes', $pacientes)
                        ->with('turno_especial', $request->turno_especial);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $turno = new Turno($request->all());
        $turno->estado = 'pendiente';
        $turno->save();
        if ($request->turno_id) {
            $turno = Turno::find($request->turno_id);
            $turno->estado = 'reprogramado';
            $turno->comentario = $request->comentario_reprogramado . '. El turno fue reprogramado para la fecha: ' . $request->fecha;
            $turno->save();
        }
        Session::flash('message', 'Se ha registrado a un nuevo turno.');
        return redirect()->route('turnos_dia');
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

        $turno = Turno::find($id);

        if ($request->enfermero_id) {
            $turno->enfermero_id = $request->enfermero_id;
            $turno->save();
            Session::flash('message', '¡Atendiendo al paciente!');
            return redirect()->route('turnos_dia');
        }


        // Si se trata de llamar a un turno se verifican si hay turnos que se llamaron y no fueron atendidos, estos se mandan a cola otra vez y se marca el consultorio al turno indicado para que la turnera lo detecte.
        if ($request->consultorio_id) {
            $turnos_en_atencion = Turno::SearchEsperando()->where('consultorio_id', $request->consultorio_id)->get();
            foreach ($turnos_en_atencion as $turno_en_atencion) {
                $turno_en_atencion->consultorio_id = null;
                $turno_en_atencion->save();
            }
            $turno->consultorio_id = $request->consultorio_id;
            $turno->save();
            Session::flash('message', '¡Llamando al paciente!');
            return redirect()->route('turnos_dia');
        }

        $turno->estado = $request->estado;
        if ($request->comentario) {
            $turno->comentario = $request->comentario;
        }

        $turno->save();
        Session::flash('message', 'El estado del turno fue actualizado.');
        return redirect()->route('turnos_dia');
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
