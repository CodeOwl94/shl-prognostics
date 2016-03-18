<?php

use Tree\Node\Node;
require 'treeDBRecursive.php';

$anzsicTree = $_SESSION['anzsicTree'];

$arrayOfChildren = $anzsicTree->getChildren();

$arrayOfValues = array(); 

foreach ($arrayOfChildren as $row) {
	$arrayOfValues[] = $row->getValue();
}

echo json_encode($arrayOfValues);


?>