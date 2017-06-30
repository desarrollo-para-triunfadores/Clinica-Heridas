<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class RelojComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view) {
        $reloj = Date::now();
        $view->with('reloj', $reloj);
    }

}
