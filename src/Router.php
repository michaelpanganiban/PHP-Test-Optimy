<?php 
    /**
     * map URL paths to specific actions
     * and then execute those actions 
     * when a matching route is requested.
     */

    namespace App;

    use App\Providers\ServiceProvider;

    class Router {
        private $routes = [];
        
        /**
         * Adds a new route to the router.
         *
         * This method maps a specific URL pattern (route) to a callback function or
         * a controller action that should be executed when the route is accessed.
         *
         * @param string $route The URL pattern to match (e.g., '/').
         * @param callable|string $callback The action to take when the route is matched.
         *                                  (e.g., 'BaseController@index').
         *
         * @return void
         */
        public function add($route, $callback):void {
            $this->routes[$route] = $callback;
        }
        
        /**
         * Dispatches the incoming request to the appropriate route.
         *
         * This method takes the requested URI and matches it against the defined routes.
         * If a match is found, the associated callback or controller method is executed.
         * If no match is found, a "404 Not Found" message is displayed.
         *
         * @param string $uri The requested URI (e.g., '/').
         *
         * @return mixed The result of the callback or controller method, or string if not found.
        */
        public function dispatch($uri) {
            foreach ($this->routes as $route => $callback) {
                if ($route === $uri) {
                    $parts = explode('@', $callback);

                    // get the controller class
                    $controller = "App\\Controllers\\" . $parts[0];

                    // get the class method
                    $method = $parts[1];

                    if (class_exists($controller)) {
                        $dependency = $this->resolveDependency($controller);
                        $controller = new $controller(...$dependency);
                        if (method_exists($controller, $method)) {
                            return call_user_func_array([$controller, $method], []);
                        }
                    }
                }
            }
            echo "404 Not Found";
        }

        /**
         * Resolves and returns the necessary dependency for the controller.
         *
         * @return mixed The dependency required by the controller (e.g., a service)
        */
        private function resolveDependency($controllerName) {
            return ServiceProvider::getDependencies($controllerName);
        }
    }

