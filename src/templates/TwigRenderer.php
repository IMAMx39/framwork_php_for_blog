<?php

namespace Imaas\MyBlog\templates;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRenderer
{
    private static Environment $_twig;

    public static function getRender() : Environment
    {
        if (!isset(self::$_twig))
        {
            $loader = new FilesystemLoader('..\src\templates');
            self::$_twig = new Environment($loader);
        }

        return self::$_twig;
    }

}
