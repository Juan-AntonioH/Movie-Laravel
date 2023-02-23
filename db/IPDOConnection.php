<?php
namespace DB;

interface IPDOConnection {

    public static function connect(): \PDO;
}
