<?php

//This is to obtain information for the first dropdown

//Open connection
require 'openDB.php';
  
// Declare the SQL statement that will query the database
$query = "SELECT * FROM tblEquipCat";

 
// Execute the SQL statement and return records
$rs= $conn->execute($query);

if (!$rs)
 
    print $conn->ErrorMsg();
 
else{

	$cats = array();
	$placeHolder = array(); 

	//Add the values the query returned to an array
	while(!$rs->EOF){

		//Add the separate columns of the query as separate entries to the $placeHolder array	
		$placeHolder[0] = (string)$rs->fields[0];
		$placeHolder[1] = (string)$rs->fields[1];
		$placeHolder[2] = (string)$rs->fields[2];

		//Add the entire $placeHolder array which is currently just the row of data to the $classes matrix
		$cats[] = $placeHolder;

		$rs->MoveNext();

	}

	//Return the array in JSON format
	echo json_encode($cats);
}
//Close the connection
require 'closeDB.php';
 
?>