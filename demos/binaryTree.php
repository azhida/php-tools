<?php
header('Content-Type:application/json; charset=utf-8');
require '../vendor/autoload.php';

function fnGetBinaryTrees()
{
    $binaryTree = new \Azhida\Tools\BinaryTree();
    $parent = $binaryTree::addNode_first('L');
    for ($i = 0; $i < 100; $i++) {
        $parent = $binaryTree::addNode($parent, array_rand(['L' => 'L', 'R' => 'R']));
    }

    $nodes = $binaryTree::$nodes;
//    $nodes = \Azhida\Tools\Tool::arrayToTree($nodes);
    return \Azhida\Tools\Tool::resSuccessMsg('', $nodes);
}

$res = fnGetBinaryTrees();
echo json_encode($res);
