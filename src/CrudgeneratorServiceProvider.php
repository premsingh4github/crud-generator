<?php

namespace Prem\Crudgenerator;

use Illuminate\Support\ServiceProvider;

class CrudgeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/crudgenerator.php' => config_path('crudgenerator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/publish/app.blade.php' => base_path('resources/views/layouts/app.blade.php'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/crud-generator/'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->commands(
            'Prem\Crudgenerator\Commands\CrudCommand',
            'Prem\Crudgenerator\Commands\CrudControllerCommand',
            'Prem\Crudgenerator\Commands\CrudModelCommand',
            'Prem\Crudgenerator\Commands\CrudMigrationCommand',
            'Prem\Crudgenerator\Commands\CrudViewCommand',
            'Prem\Crudgenerator\Commands\CrudLangCommand'
        );
    }
}
