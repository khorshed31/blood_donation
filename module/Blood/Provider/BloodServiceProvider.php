<?php


namespace Module\Blood\Provider;


use Illuminate\Support\ServiceProvider;

class BloodServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom([
            base_path() . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . 'Blood' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'migrations',
        ]);

        $this->loadMigrationsFrom([
            base_path() . DIRECTORY_SEPARATOR . 'module' . DIRECTORY_SEPARATOR . 'Blood' . DIRECTORY_SEPARATOR . 'migrations',
        ]);
    }

}
