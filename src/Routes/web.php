<?php 
    /**
     * Centralized routing system 
     * which process the the routes to their
     * respective classes and functions
     */

    namespace App\Routes;

    use App\Router;

    $router = new Router();

    $router->add('/', 'BaseController@show');

    return $router;

