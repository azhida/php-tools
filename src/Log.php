<?php

namespace Azhida\Tools;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class Log
{
    public static function loggerCustom($message, $context)
    {
        $date = date('Y-m-d');

        $logger = new Logger('logger');
        $logger->pushHandler(new StreamHandler('../logs/' . $date . '.log', Logger::DEBUG));
        $logger->pushHandler(new FirePHPHandler());

        $logger->info($message, $context);
    }

}