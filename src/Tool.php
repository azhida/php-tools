<?php

namespace Azhida\Tools;

class Tool
{
    /**
     * @param array $array
     * @param string $id_name
     * @param string $parent_id_name
     * @param string $children_name
     * @return array
     * 一维数组转树形结构
     */
    public function arrayToTree(array $array = [], $id_name = 'id', $parent_id_name = 'parent_id', $children_name = 'children')
    {
        $items = [];
        foreach ($array as $value) {
            if (!isset($value[$id_name]) || !isset($value[$parent_id_name])) return [];
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

}