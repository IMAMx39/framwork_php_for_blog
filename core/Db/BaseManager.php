<?php

namespace Core\Db;
use Core\Db\Config\ConfigDb;
use PDO;

class BaseManager
{
    private static PDO $cnx;

    protected static function getCnx() : PDO
    {
        if (!isset(self::$cnx))
        {
            $host = ConfigDb::get('db_host');
            $name = ConfigDb::get('db_name');
            $user = ConfigDb::get('db_user');
            $password = ConfigDb::get('db_password');

            self::$cnx = new PDO('mysql:host='.$host.';dbname='.$name.';charset=utf8', $user, $password);
        }

        return self::$cnx;
    }

}