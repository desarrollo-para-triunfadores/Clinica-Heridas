<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rol;
use App\Provincia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
Use Session;

class RolesController extends Controller {

    public function __construct() {
        Carbon::setlocale('es');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $roles = Rol::all();
        return view('/roles/main')->with('roles', $roles); // se devuelven los registros
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
        $modulos = "";
        $rol = new Rol();
        if($request->usuarios_roles == true){
            $modulos = 'Usuarios & Roles |';
        }
        if($request->obras_sociales == true) {
            $modulos = $modulos." ".'Obras Sociales |';
        }
        if($request->pacientes == true) {
            $modulos = $modulos." ".'Pacientes |';
        }
        if($request->turnos == true) {
            $modulos = $modulos." ".'Gestión de Turnos |';
        }
        if($request->enfermeros == true) {
            $modulos = $modulos." ".'Enfermeros |';
        }
        if($request->medicos == true) {
            $modulos = $modulos." ".'Médicos |';
        }
        $rol->nombre = $request->nombre;
        $rol->modulos = $modulos;
        $rol->save();
        Session::flash('message', '¡Se ha registrado a un nuevo rol de acceso');
        return redirect()->route('roles.index');
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
        $rol = Rol::find($id);
        $rol->fill($request->all());
        $rol->save();
        Session::flash('message', '¡Se ha actualizado la información del rol con éxito!');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $rol = Rol::find($id);
        $rol->delete();
        Session::flash('message', '¡El rol seleccionado a sido eliminado!');
        return redirect()->route('roles.index');
    }

}
