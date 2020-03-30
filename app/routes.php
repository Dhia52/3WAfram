<?php

function getRoutes()
{
    $routes = FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
        $r->get('/', 'Home::home');
    });
    return $routes;
}