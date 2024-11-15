<?php

namespace Core;

class Route {
    public static $routes = [];
    
    public static $rootPath = '/du_an_mau/mvc-project';

    public static function get($route, $args){
        self::$routes[self::$rootPath . $route] = $args;
    }
}