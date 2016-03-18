<?php

$debug =0;

require 'vendor/autoload.php';
require 'getData.php';
require 'recursiveAdd.php';
use Tree\Node\Node;

$anzsic = getData();

$builder = new Tree\Builder\NodeBuilder;

$builder
->value($anzsic[0]);
    //Don't put end if no trees are made in here
;

$rootNode = $builder->getNode();

//Populate the tree
recursiveAdd($rootNode, $anzsic);

/*session_start();
$_SESSION['anzsicTree'] = $rootNode;

$anzsicTree = $_SESSION['anzsicTree'];*/

$arrayOfChildren = $rootNode->getChildren();

$arrayOfValues = array(); 

/*foreach ($arrayOfChildren as $row) {
	$rowValue = $row->getValue();
	$holder = array();

	$holder[0] = $rowValue['ID'];
	$holder[1] = $rowValue['Description']; 

	$arrayOfValues[] = $holder;
}*/

foreach ($arrayOfChildren as $row) {
	$rowValue = $row->getValue();
	$arrayOfValues[] = $rowValue;
}

echo json_encode($arrayOfValues);


?>