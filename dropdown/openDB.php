<?php

//This code opens a connection to the relevant database
 
include('..\adodb5\adodb.inc.php'); 
 
//This contains all the php adodb functions.  Download from sourceforge.net: http://sourceforge.net/projects/adodb/?source=typ_redirect
 
// Create an instance of the ADO connection object
$conn = new COM("ADODB.Connection") or die("Cannot start ADO");

// Define the connection string and specify the database driver
$connStr = "Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=.\dropdown\DataCodes.accdb";    //Put in the filepath to the access database where highlighted.
 
 
// Open the connection to the database
$conn->open($connStr);
 ?>
