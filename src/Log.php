<?php

namespace Azhida\Tools;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Log
{
    // 自定义日志
    public static function loggerCustom($controller_name, $function_name, $message, $context = [], $echo_only = false, $log_file_name = '')
    {
        $echo_message = $controller_name . '::' . $function_name . '() ' . $message . " => ";
        if (!is_array($context)) {
            $context = [$context];
        }
        if ($echo_only) return $echo_message . json_encode($context, JSON_UNESCAPED_UNICODE) . "\n";
        $message .= "\n";

        $log_file = self::getLogFile($log_file_name);
        $logger = new Logger($controller_name .'::'. $function_name);
        $logger->pushHandler(new StreamHandler($log_file, Logger::INFO));
        $logger->info($message, $context);
    }

    private static function getLogFile($log_file_name = '')
    {
        if (!$log_file_name) $log_file_name = 'default';
        $log_file = '/logs/' . $log_file_name . '.log-' . date('Y-m-d');
        if (function_exists('storage_path')) {
            $log_file = storage_path() . $log_file;
        } else {
            $log_file = '.' . $log_file;
        }
        return $log_file;
    }

}