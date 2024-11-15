<?php

namespace Core\Providers;

use Core\Route;
use Error;

class RouteProvider {
    public function __construct()
    {
        [$controller, $method] = $this->analyseRoute();

        if (! class_exists($controller)) {
            throw new Error('Controller not found: ' . $controller);
        }

        if (! method_exists($controller, $method)) {
            throw new Error("Method '$method' not found in controller '$controller'.");
        }

        $controllerInstance = new $controller;

        return $controllerInstance->{$method}();
    }

    public function analyseRoute()
    {
        $routes = Route::$routes;

        $reqURI = $_SERVER['REQUEST_URI'];

        $parsedReqURI = $this->parseReqURI($reqURI);

        $resource = $routes[$parsedReqURI];

        return [$resource[0], $resource[1]];
    }

    public function parseReqURI($reqURI)
    {
        $isExisted = strpos($reqURI, Route::$rootPath) !== false;

        if ($isExisted) {
            return $reqURI;
        }

        return Route::$rootPath . $reqURI;
    }
}

new RouteProvider;