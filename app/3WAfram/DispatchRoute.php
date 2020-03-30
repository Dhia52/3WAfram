<?php

namespace Fram;

use \FastRoute\Dispatcher;

class DispatchRoute
{
    private $request;
    private $routes;

    public function __construct(Request $request, $routes)
    {
        $this->setRequest($request);
        $this->setRoutes($routes);
    }

    private function setRequest(Request $request)
    {
        $this->request = $request;
    }

    private function setRoutes($routes)
    {
        $this->routes = $routes;
    }

    public function dispatch()
    {
        $httpMethod = $this->request->getMethod();
        $uri = $this->request->getUri();

        $routeInfo = $this->routes->dispatch($httpMethod, $uri);

        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                // ... 404 Not Found
                http_response_code(404);
                $controller = new \App\Controller\Error(404);
                echo $controller->displayErrorPage();
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                // ... 405 Method Not Allowed
                http_response_code(405);
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                // ... call $handler with $vars
                $path = explode('::', $handler);
                $controllerName = "App\\Controller\\" . $path[0];
                $controller = new $controllerName;
                $method = $path[1];
                echo $controller->$method();
                break;
        }
    }
}