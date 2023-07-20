<?php

namespace Core\Mailer;

class Mailer
{
    private static array $dsn = [
        'mailer_dsn' => 'smtp://contact@blog.imam-maassou.com:Imamthebest1@tourte.o2switch.net:465',
    ];

    public static function getMailerDsn($key): ?string
    {
        if (!isset(self::$dsn[$key])) {
            return null;
        }

        return self::$dsn[$key];
    }
}