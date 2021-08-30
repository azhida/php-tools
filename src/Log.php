<?php

namespace Azhida\Tools;

class Log
{
    // 自定义日志 -- 仅支持laravel框架
    public static function loggerCustom_laravel($controller_name, $function_name, $message, $context = [], $echo_only = false) {
        $message = $controller_name . '::' . $function_name . '() ' . $message . " => ";
        if (!is_array($context)) {
            $context = [$context];
        }
        if ($echo_only) return $message . json_encode($context, JSON_UNESCAPED_UNICODE) . "\n";
        $message .= "\n";
        logger($message, $context); // 该方法为 laravel框架内方法，仅支持laravel框架调内调用
    }
}