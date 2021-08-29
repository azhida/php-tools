<?php

namespace Azhida\Tools;

class Tool
{
    /**
     * @return array
     * @param $socure array 原数据[二维数组]
     * @param array $condition 查询条件[一维数组]
     * 查询二维数组中指定的 键值对
     */
    public static function fnArrayFilter($socure, array $condition) {
        return array_filter($socure, function ($value) use($condition) {
            $re = true;
            foreach ($condition as $k => $v) {
                if (!isset($value[$k]) || $value[$k] != $v) {
                    $re = false;
                    break;
                }
            }
            return $re;
        });
    }

    /**
     * @param array $array
     * @param string $id_name
     * @param string $parent_id_name
     * @param string $children_name
     * @return array
     * 一维数组转树形结构
     */
    public static function arrayToTree(array $array = [], $id_name = 'id', $parent_id_name = 'parent_id', $children_name = 'children')
    {
        $items = [];
        foreach ($array as $value) {
            if (!isset($value[$id_name]) || !isset($value[$parent_id_name])) return [];
            if (!isset($value[$children_name])) $value[$children_name] = [];
            $items[$value[$id_name]] = $value;
        }

        $tree  =  array ();  //格式化好的树
        foreach  ( $items  as $key => $item ) {
            if  (isset( $items [ $item [$parent_id_name]])) {
                $items [ $item [$parent_id_name]][$children_name][] = & $items [ $item [$id_name]];
            } else {
                $tree [] = & $items [ $item [$id_name]];
            }
        }
        return  $tree ;
    }

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