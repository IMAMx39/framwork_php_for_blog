<?php

namespace Core;

use App\Model\User;

class Session
{

    public static function Destroy() : void
    {
        if(session_status() == PHP_SESSION_ACTIVE)
        {
            session_unset();
            session_destroy();
        }
    }

    public function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }



    public static function start(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            ini_set('session.use_strict_mode', 1); // Ensure strict mode
            \session_start();

        }
    }


    public function delete($key): void
    {
        unset($_SESSION[$key]);
    }

    public static function GetUsername() : ?string
    {
        return isset($_SESSION['username']) ? $_SESSION['username'] : null;
    }
}