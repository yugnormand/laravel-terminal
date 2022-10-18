<?php namespace Todocoding\LaravelTerminal;

use Illuminate\Support\ServiceProvider;

class TerminalServiceprovider extends ServiceProvider{


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        // Get namespace
        $nameSpace = $this->app->getNamespace();

        // Routes
        $this->app->router->group(['namespace' => $nameSpace . 'Http\Controllers'], function()
        {
            require __DIR__.'/Http/routes.php';
        });

        // Views
        $this->publishes([
            __DIR__.'/../src/Http/Controllers' => base_path('app//Http/Controllers'),
            __DIR__.'/../views' => base_path('resources/views'),
        ]);
    }

    public function register() {}

}
