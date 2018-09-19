<?php

use Illuminate\Routing\Router;
use App\Client;
use App\Market;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    Route::resource('client','ClientController');
    Route::resource('market','MarketController');



	Route::get('api/client/', 'ClientController@client');

});
