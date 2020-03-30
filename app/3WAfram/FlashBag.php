<?php

namespace Fram;

class FlashBag
{
    public function __construct()
    {
        $bStatus = false;
        if (php_sapi_name() !== 'cli') {
            $bStatus = (session_status() === PHP_SESSION_ACTIVE ? true : false);
        }

        if (!$bStatus) {
            session_start();
        }
    }

    public function set($message, $type = 'success')
    {
        $_SESSION['flashbag'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public function get()
    {
        if (!empty($_SESSION['flashbag']) && is_array($_SESSION['flashbag'])) {
            $return = $_SESSION['flashbag'];
            unset($_SESSION['flashbag']);
            return $return;
        }
    }
}