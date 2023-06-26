<?php

namespace Core;

use Twig\Environment;
use Twig\Extra\Intl\IntlExtension;
use Twig\Loader\FilesystemLoader;

class Twig
{
    private static Environment $_twig;

    public static function getInstance() : Environment
    {
        if (!isset(self::$_twig))
        {
            $loader = new FilesystemLoader('../templates');
            self::$_twig = new Environment($loader);
            self::$_twig->addExtension(new IntlExtension());
        }

        return self::$_twig;
    }
}