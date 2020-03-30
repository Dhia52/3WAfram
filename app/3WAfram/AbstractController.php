<?php

namespace Fram;

abstract class AbstractController //implements iController
{
    protected $templateEngine;
    protected $flashbag;

    public function __construct()
    {
        $loader = new \Twig\Loader\FileSystemLoader(dirname(__DIR__, 2) . '/templates');
        $this->templateEngine = new \Twig\Environment($loader);
        $this->flashbag = new flashbag();
    }

    protected function render($view, $vars = [])
    {
        return $this->templateEngine->render($view . '.html.twig', $vars);
    }

    protected function flash()
    {
        return $this->flashbag;
    }

    protected function redirectToRoute($url)
    {
        header('Location: ' . $url);
        exit();
    }
}