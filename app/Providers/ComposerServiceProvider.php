<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['partes.navTop', 'turnera.main','auth.login', 'configuracion.show', 'configuracion.formulario.editar'], 'App\Http\ViewComposers\ConfiguracionComposer');
        View::composer(['turnera.partes.tablas'], 'App\Http\ViewComposers\TurneraComposer');
        View::composer(['turnera.partes.reloj'], 'App\Http\ViewComposers\RelojComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
