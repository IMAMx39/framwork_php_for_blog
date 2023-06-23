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

    public static function setUser(User $user)
    {
        if (session_status() != PHP_SESSION_ACTIVE){
            Session::start();
        }
        $_SESSION['username'] = $user->getEmail();
        return Session::isLogged();
    }

    public static function isLogged() : bool
    {

        if(session_status() != PHP_SESSION_ACTIVE) {
            Session::Start();
        }

        session_regenerate_id();

        return isset($_SESSION['username']);
    }

    public static function start(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            \session_start();
        }
    }


    public function delete($key): void
    {
        unset($_SESSION[$key]);
    }

}