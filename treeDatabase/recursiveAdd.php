<?php 
use Tree\Node\Node;

//This function adds children to the correct parent node
function recursiveAdd(&$node, &$table)
{

	$nodeArray = $node->getValue();

	/*switch ($nodeArray['Level']) {
		case 0:
			echo "";
			echo $nodeArray['Description']."</br>";
			break;
		
		case 1:
			echo "1-> ";
			echo $nodeArray['Description']."</br>";
			break;

		case 2:
			echo "&nbsp&nbsp&nbsp2----> ";
			echo $nodeArray['Description']."</br>";
			break;

		case 3:
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp3--------> ";
			echo $nodeArray['Description']."</br>";
			break;

		case 4:
			echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp4------------> ";
			echo $nodeArray['Description']."</br>";
			break;	
		

		default:
			# code...
			break;
	}*/

	foreach ($table as $index => $row) {
		
		if ($row['Parent_ID']==$nodeArray['ID']) {
			
			//Add the found row as a child
			$child = new Node($row);
			$node->addChild($child);
			
			//Remove it from the table as it can't be the child of any other node after this
			unset($table[$index]);

			//Call the function on the newly added node
			recursiveAdd($child, $table);
		} 
	}

}

?>