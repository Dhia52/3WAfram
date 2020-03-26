<?php

namespace Fram;

class Request
{
    private $method;
    private $uri;

    public function __construct()
    {
        $this->setMethod();
        $this->setUri();
    }

    private function setMethod() // Fetch method and URI from somewhere
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    private function setUri() // Strip query string (?foo=bar) and decode URI
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $this->uri = rawurldecode($uri);
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUri()
    {
        return $this->uri;
    }
}