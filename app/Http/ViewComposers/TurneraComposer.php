<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Turno;


class TurneraComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view) {
        $turnos_en_atencion = Turno::SearchEsperando()->where('consultorio_id', '<>', null)->orderby('updated_at', 'asc')->get();
        $turnos_esperando = Turno::SearchEsperando()->where('consultorio_id', null)->orderby('updated_at', 'asc')->get();

        $view->with('turnos_en_atencion', $turnos_en_atencion)
                ->with('turnos_esperando', $turnos_esperando);
    }

}
