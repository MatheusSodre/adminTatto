<?php

namespace App\Logging;

use Monolog\Logger;

class CreateCustomMySQLLogger
{
    public function __invoke(array $config)
    {
        $logger = new Logger('mysql');
        $logger->pushHandler(new MySQLDatabaseHandler()); // Usar o handler renomeado
        return $logger;
    }
}
