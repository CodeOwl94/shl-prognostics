<?php

$debug =0;

require 'vendor/autoload.php';
use Tree\Node\Node;

include 'getData.php';

$anzsic = getData();


/*foreach ($anzsic as $row) {
    foreach ($row as $field) {
        #    echo (string)$field.PHP_EOL;

    }
    #echo '</br>';
}*/

$builder = new Tree\Builder\NodeBuilder;

$builder
->value('Root')
    //Don't put end if no trees are made in here
;

$rootNode = $builder->getNode();

$levelTwo = new Node('2');

//Add all the level 1s
foreach ($anzsic as $row) {
    if ($row['Parent_ID']==0) {
        $child = new Node($row);
        $rootNode->addChild($child);
    }
}

//Get a set of all the level 1s
$children = $rootNode->getChildren();

//Add all the level 2s
foreach ($children as $child) { //cycle through level 1s

    $valueArray = $child->getValue(); //get the level 1 value 

    if ($debug) {
        echo $valueArray['Description'];
        echo "</br>";
    }

    foreach ($anzsic as $row) { //cycle through anzsic entries

        if ($valueArray['ID']==$row['Parent_ID']) { //if there's a match between the level 1 id and the parent id of a level 2, add the level 2 as a child of the level 1 node
            $grandchild = new Node($row);
            $child->addChild($grandchild);

            if ($debug) {
                echo "-->";
                echo $row['Description'];
                echo "</br>";
            }

            $levelTwo->addChild($grandchild);
        }
    }
}

$debug =0;

//Add all the level 3s
foreach ($children as $child) { //cycle through level 2s

    $valueArray = $child->getValue(); //get the level 2 value 

    if ($debug) {
        echo $valueArray['Description'];
        echo "</br>";
    }

    foreach ($anzsic as $row) { //cycle through anzsic entries

        if ($valueArray['ID']==$row['Parent_ID']) { //if there's a match between the level 2 id and the parent id of a level 3, add the level 3 as a child of the level 2 node
        $grandchild = new Node($row);
        $child->addChild($grandchild);

            if ($debug) {
                echo "--->";
                echo $row['Description'];
                echo "</br>";
            }
        }
    }
}

echo "Some quick testing";
echo '</br>';

$test = array();
$first = ["Hi", "how"];
$second = ["toy", "tear"];
$third = ["blob", "you"];

$test[] = $first;
$test[] = $second;
$test[] = $third;

foreach ($test as $row) {
    foreach ($row as $field) {
        echo $field.PHP_EOL;
       }
    echo '</br>';

}

foreach ($test as $index => $row) {
    foreach ($row as $field) {
        if (!strcmp($field, "Hi")) {
            unset($test[$index]);
        }
    }
}

#unset($test[1]);

echo '</br>';
echo "Second run";
echo '</br>';

foreach ($test as $row) {
    foreach ($row as $field) {
        echo $field.PHP_EOL;
    }
    echo '</br>';
}

?>