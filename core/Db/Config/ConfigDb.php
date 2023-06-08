<?php

namespace Core\Db\Config;


class ConfigDb
{
    private static array $_config = [
        'db_user'       => 'alpha',
        'db_password'   => '',
        'db_host'       => 'localhost',
        'db_name'       => 'blog',

    ];

    public static function get($key) : ?string
    {
        if(!isset(self::$_config[$key])) {
            return null;
        }

        return self::$_config[$key];
    }
}