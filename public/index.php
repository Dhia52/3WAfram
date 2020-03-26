<?php

require dirname(__DIR__) . '/vendor/autoload.php';
include dirname(__DIR__) . '/app/routes.php';

$request = new \Fram\Request();

$kernel = new \Fram\Kernel($request);
$kernel->run();