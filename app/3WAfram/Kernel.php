<?php

namespace Fram;

class Kernel
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function run()
    {
        $routes = getRoutes();
        $dispatcher = new DispatchRoute($this->request, $routes);
        $dispatcher->dispatch();
    }
}