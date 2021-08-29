<?php

require 'src/Tool.php';

function arrayToTree()
{
    $array = [];
    for ($i = 1; $i <= 100; $i++) {
        $parent_id = 0;
        if (!empty($array)) {
            $parent_ids = array_column($array, 'id');
            $parent_id = $parent_ids[array_rand($parent_ids)];
        }
        $array[] = [
            'id' => $i,
            'parent_id' => $parent_id,
        ];
    }
    $tool = new Azhida\Tools\Tool();
    $tree = $tool->arrayToTree($array);
    return $tree;
}
$tree = arrayToTree();
var_dump($tree);
