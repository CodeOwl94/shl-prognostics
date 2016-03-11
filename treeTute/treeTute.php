<?php

require 'vendor/autoload.php';
use Tree\Node\Node;

$builder = new Tree\Builder\NodeBuilder;

$builder
    ->value('0')
    ->leaf('1')
    ->tree('2')
        ->tree('2.1')
            ->leaf('2.1.1')
            ->leaf('2.1.2')
            ->end()
        ->leaf('2.2')
        ->leaf('2.3')
        ->end()
;

#Assign the tree we just built to a node
$root = $builder->getNode();

#Get the children of the root node
$children = $root->getChildren();

#Get the first child, the leftmost, of the root node
$firstChild = $children[0];

echo "The first child is ".$firstChild->getValue().PHP_EOL;

#Nodes can have values that are any type of PHP variable. We will now test that out
$cars = array("Check", "This", "Out");

#Create a new node
$childTest = new Node($cars);;

#Set this new node to be a child of the first child retrieved earlier
$firstChild->addChild($childTest); 

#Get a list of nodes belonging to the firstChild
$grandchildren = $firstChild->getChildren();

#Swap to the first grandchild, the $childTest node which should contain $cars
$firstGrandchild = $grandchildren[0];

#Assign the array to a variable and then print all the items in the array
$firstGrandchildList = $firstGrandchild->getValue();

echo "The set of values within the firstGrandchild is ".PHP_EOL;

foreach ($firstGrandchildList as $item) {
	echo $item.PHP_EOL;
}

?>