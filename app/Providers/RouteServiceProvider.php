<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {

        parent::boot($router);

        $router->model('client_id', 'App\Client');
        //client with trashed
        $router->bind('client_id_wt', function ($value) {
            return \App\Client::withTrashed()->findOrFail($value);
        });

        $router->bind('contract_id', function ($value) {
            return \App\Contract::with('client','technical','recipient')->findOrFail($value);
        });
        $router->model('permission_id', 'App\Permission');

		$router->model('technical_id', 'App\Technical');
		$router->bind('technical_id_wt', function ($value) {
			return \App\Technical::withTrashed()->findOrFail($value);
		});
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
