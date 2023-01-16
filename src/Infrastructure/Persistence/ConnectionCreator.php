<?php

namespace Walber2903\PdoCourse\Infrastructure\Persistence ;
use PDO;

class ConnectionCreator
{
    public static function createConnection(): \PDO
    {
        $database_address = __DIR__ . '/../../../database.sqlite';

        return new PDO('sqlite:' . $database_address);
    }
}