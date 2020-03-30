<?php

namespace App\Controller;

use \Fram\AbstractController;

class Error extends AbstractController
{
    private $error_code;

    public function __construct(int $code)
    {
        parent::__construct();
        $this->setErrorCode($code);
    }

    public function setErrorCode(int $code)
    {
        $this->error_code = $code;
    }

    public function displayErrorPage()
    {
        $file_path = '/errors/error_' . $this->error_code;
        return $this->render($file_path);
    }
}