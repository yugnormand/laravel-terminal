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
            __DIR__.'/../src/Http/Controllers' => base_path('app/Http/Controllers'),
            __DIR__.'/../views' => base_path('resources/views/terminal'),
        ]);

        // file_put_contents(
        //         base_path('routes/web.php'),
        //         file_get_contents(__DIR__.'/../src/Http/routes.php'),
        //         FILE_APPEND
        // );
    }

    public function register() {}

}
