<?php 
    /*
        Serves as the root file of the program and its entry point
        for every requests
        it redirects the program to the right route 
        depending on the uri request.
    */
    require_once __DIR__ . '/Autoloader.php';
    
    // instantiate Autoloader class
    $autoloader = new \App\Autoloader();
    spl_autoload_register([$autoloader, 'loadClass']);
    
    // Load routes
    $router = require 'src/Routes/web.php';
    
    // Check if $_SERVER['REQUEST_URI'] is not empty
    // then get the current uri
    $uri = isset($_SERVER['REQUEST_URI']) ? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '/';

    // Dispatch the router
    $router->dispatch($uri);
    
