<?php
header('Content-Type:application/json; charset=utf-8');
require '../vendor/autoload.php';

function fnGetBinaryTrees()
{
    logger_custom(__CLASS__, __FUNCTION__, 121);

    $binaryTree = new \Azhida\Tools\BinaryTree();
    $parent = $binaryTree::addNode_first('L');
    for ($i = 0; $i < 100; $i++) {
        $parent = $binaryTree::addNode($parent, array_rand(['L' => 'L', 'R' => 'R']));
    }

    $nodes = $binaryTree::$nodes;
//    $nodes = \Azhida\Tools\Tool::arrayToTree($nodes);
    return res_success_msg('', $nodes);
}

$res = fnGetBinaryTrees();
echo json_encode($res);
