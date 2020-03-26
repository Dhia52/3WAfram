<?php

namespace Fram;

abstract class AbstractController //implements iController
{
    private $templateEngine;

    public function __construct()
    {
        $loader = new \Twig\Loader\FileSystemLoader(dirname(__DIR__, 2) . '/templates');
        $this->templateEngine = new \Twig\Environment($loader);
    }

    protected function render($view, $vars = [])
    {
        return $this->templateEngine->render($view . '.html.twig', $vars);
    }
}