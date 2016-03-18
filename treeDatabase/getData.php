<?php

//This is to obtain information for the first dropdown
function getData()
{

//Will hold final data
$anzsic = array();

//Open connection
require 'openDB.php';
  
// Declare the SQL statement that will query the database
$query = "SELECT * FROM [ANZSIC Codes]";

 
// Execute the SQL statement and return records
$rs= $conn->execute($query);

if (!$rs)
 
    print $conn->ErrorMsg();
 
else{

	//$anzsic = array();
	$placeHolder = array(); 

	//Add the values the query returned to an array
	while(!$rs->EOF){

		//Add the separate columns of the query as separate entries to the $placeHolder array	
		$placeHolder['ID'] = (int)$rs->fields['ID']->value;
		$placeHolder['ANZSIC_Code'] = (int)$rs->fields['ANZSIC_Code']->value;
		$placeHolder['Description'] = (string)$rs->fields['Description']->value;
		$placeHolder['Division'] = (string)$rs->fields['Division']->value;
		$placeHolder['Parent_ID'] = (int)$rs->fields['Parent_ID']->value;
		

		//Add the entire $placeHolder array which is currently just the row of data to the $anzsic matrix
		$anzsic[] = $placeHolder;

		$rs->MoveNext();

	}

	//Return the array in JSON format
	//echo json_encode($cats);
}
//Close the connection
require 'closeDB.php';

return $anzsic;
 }
?>