<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Configuracion;

class ConfiguracionComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view) {
        $configuracion = Configuracion::find(1);
        $view->with('configuracion', $configuracion);
    }

}



