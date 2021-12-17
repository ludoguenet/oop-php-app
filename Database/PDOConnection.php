<?php

namespace Database;

use PDO;

final class PDOConnection
{
    private static $PDO_instance;
    private static array $params = [
        'host' => 'localhost',
        'db' => 'designpatterns',
        'username' => 'root',
        'password' => ''
    ];

    public static function getPDO(): PDO
    {
        if (is_null(self::$PDO_instance))
        {
            self::$PDO_instance = new PDO(
                'mysql:host=' . self::getParams('host') . ';dbname=' . self::getParams('db'),
                self::getParams('username'),
                self::getParams('password'),
                [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::ATTR_EMULATE_PREPARES, false]
            );
        }

        return self::$PDO_instance;
    }

    private static function getParams(string $key)
    {
        return self::$params[$key] ?? '';
    }
}