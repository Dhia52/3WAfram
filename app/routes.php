<?php

function getRoutes()
{
    $routes = FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
        $r->get('/{home}', 'Home::display');
    });
    return $routes;
}