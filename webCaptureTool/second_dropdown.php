<?php

//This is to obtain information for the second dropdown

//Check that the first dropdown has already had a value
if(isset($_GET["cat"])){

//Open connection
require 'openDB.php';

//Get the category
$cat = $_GET["cat"];

// Declare the SQL statement that will query the database
$query = "SELECT tblEquipClass.Class, tblEquipClass.EquipmentClass FROM tblEquipClass INNER JOIN tblEquipCat ON tblEquipClass.EquipCategory_ID=tblEquipCat.Category WHERE tblEquipCat.Category = {$cat}";
 
// Execute the SQL statement and return records
$rs= $conn->execute($query);

if (!$rs)

    print $conn->ErrorMsg();
 
else{

	$classes = array();
	$placeHolder = array();

	//Add the values from the query to the array
	while(!$rs->EOF){

	//Add the separate columns of the query as separate entries to the $placeHolder array	
	$placeHolder[0] = (string)$rs->fields[0];
	$placeHolder[1] = (string)$rs->fields[1];

	//Add the entire $placeHolder array which is currently just the row of data to the $classes matrix
	$classes[] = $placeHolder; 
	$rs->MoveNext();

	}

	//Return the array in JSON format
	echo json_encode($classes);
}
//Close the connection
require 'closeDB.php';
}
 
?>