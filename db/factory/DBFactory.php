<?php
namespace DB\factory;

use DB\impl\MysqlPDO;
use DB\IPDOConnection;

Class DBFactory {

    public static function getConnection(): IPDOConnection{
        return new MysqlPDO();
    }
}
