<?php

namespace DB\impl;

use DB\IPDOConnection;
use PDO;



class MysqlPDO implements IPDOConnection
{
    public static function connect(): PDO
    {
        try {
            // $pdo = new PDO($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            $pdo = new PDO($_ENV['DB_CONNECTION'].":host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_DATABASE'],$_ENV['DB_USERNAME'],$_ENV['DB_PASSWORD']);
            // $pdo = new \PDO('mysql:host=localhost;dbname=Videoclub', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("set names utf8");
            return $pdo;
        } catch (\Throwable $th) {
            throw new \PDOException("Error al conectar con la base de datos", 500);
        }
    }
}
